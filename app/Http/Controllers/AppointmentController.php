<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Citizen;
use App\Models\Maternal;
use App\Models\Nutritional;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('citizen')->get();

        return view('appointment.index', compact('appointments'));
    }

    public function create(Request $request)
    {
        $citizen = Citizen::with('household.purok')->findOrFail($request->get('citizen_id'));

        if ($citizen->sex === 'MALE' or $citizen->dob->age <= 10) {
            return abort(404);
        }

        abort_if(!in_array($request->get('appointment'), ['child', 'maternal', 'nutritional', 'others']), 404);

        return view('appointment.create', [
            'citizen' => $citizen,
        ]);
    }

    public function show(Appointment $appointment)
    {
        $appointment->load('citizen.appointments', 'medic');

        return view('appointment.show', compact('appointment'));
    }

    public function assess(Appointment $appointment, Request $request)
    {
        $appointment->load('citizen');

        switch ($appointment->medic_type) {
            case 'maternal':
                $type = $this->maternal($request, $appointment);
                break;
            case 'nutritional':
                $type = $this->nutritional($request, $appointment);
                break;
            default:
                $type = null;
                break;

        }

        $appointment->update([
            'medic_id' => $type->id ?? null,
            'remarks'  => $request->post('remarks'),
        ]);

        return response()->json([
            'message'  => 'Assessment has been recorded',
            'title'    => 'Success',
            'intended' => route('appointment.show', $appointment->id),
        ]);

    }

    public function edit(Appointment $appointment)
    {
        $citizen = Citizen::findOrFail($appointment->citizen_id);
        return view('appointment.edit', compact('appointment', 'citizen'));
    }

    public function store(Request $request)
    {
        abort_if(!in_array($request->get('appointment'), ['child', 'maternal', 'nutritional', 'others']), 404);

        $appointment = Appointment::create([
            'medic_type' => ($request->get('appointment') == 'others') ? null : $request->get('appointment'),
            'schedule'   => $request->post('schedule'),
            'citizen_id' => $request->post('citizen_id'),
        ]);

        return response()->json([
            'title'    => 'Appointed',
            'message'  => 'Appointment has been recorder. Appointment ID: ' . $appointment->id,
            'intended' => ($request->has('walkin')) ? route('appointment.show', $appointment->id) : route('citizen.show', $request->post('citizen_id')),
        ], 201);
    }

    private function maternal(Request $request, Appointment $appointment): Maternal
    {
        switch ($request->post('preg')) {
            case 'deliver':
                $bbd = $request->post('baby');

                // register the baby as citizen
                $baby = Citizen::create([
                    'household_id' => $appointment->citizen->household_id,
                    'name'         => [
                        'first'  => strtoupper($bbd['name']['first']),
                        'middle' => strtoupper($bbd['name']['middle']),
                        'last'   => strtoupper($bbd['name']['last']),
                        'suffix' => $bbd['name']['suffix'] ?? null,
                    ],
                    'birthdate'    => $bbd['birthdate'],
                    'philhealth'   => null,
                    'sex'          => $bbd['sex'],
                    '4ps'          => false,
                    'props'        => [
                        'birth' => $bbd,
                        'mother' => name($appointment->citizen->name)
                    ],
                ]);

                // marking the parent not pregnant
                $appointment->citizen->update([
                    'props->isPregnant' => false,
                ]);
                break;
            case 'pregnant':
                // marking the parent not pregnant
                $appointment->citizen->update([
                    'props->isPregnant' => true,
                ]);
                break;
            default:
                // marking the parent not pregnant
                $appointment->citizen->update([
                    'props->isPregnant' => false,
                ]);
                break;
        }

        return Maternal::create([
            'weight'         => $request->post('weight'),
            'height'         => $request->post('height'),
            'blood_preasure' => $request->post('blood_presure'),
            'tummy'          => $request->post('tummy'),
            'baby'           => $baby->id ?? null,
        ]);
    }

    private function nutritional(Request $request, Appointment $appointment): Nutritional
    {
         // marking the citizen nutrition
         $appointment->citizen->update([
            'props->nutritionStatus' => $request->post('nutrition_status'),
            'props->needVaccine' => ($request->has('need_vac')) ?  true : false,
            'props->needVitamins' => ($request->has('need_vit')) ?  true : false
        ]);

        return Nutritional::create([
            'weight' => $request->post('weight'),
            'height' => $request->post('height'),
            'wfa'    => $request->post('wfa'),
            'hfa'    => $request->post('hfa'),
            'wfh'    => $request->post('wfh'),
        ]);
    }
}
