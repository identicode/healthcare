<?php

namespace App\Http\Controllers;

use App\Http\Requests\Citizen\StoreRequest;
use App\Models\Appointment;
use App\Models\Citizen;
use App\Models\Household;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $citizens    = Citizen::with('household.purok')->get();
            $collections = \App\Http\Resources\Citizen\DT::collection($citizens);
            return response()->json($collections);
        }
        return view('citizen.index');
    }

    public function create()
    {
        $households = Household::with('purok')->get();
        $mothers    = Citizen::where('sex', 'FEMALE')->get();

        return view('citizen.create', compact('mothers', 'households'));
    }

    public function store(StoreRequest $request)
    {

        $form = $this->form_data($request);

        if ($request->post('mother_name') !== null) {
            $form['props']['mother'] = $request->post('mother_name');
        }

        $citizen = Citizen::create($form);

        activity()->on($citizen)->log('Create citizen');


        return response()->json([
            'title'    => 'Success!',
            'message'  => 'Citizen has been registered!',
            'intended' => route('citizen.show', $citizen->id),

        ], 201);
    }

    public function show(Citizen $citizen, Request $request)
    {
        $citizen->load('household', 'appointments');
        activity()->on($citizen)->log('Show citizen');

        return view('citizen.show', compact('citizen'));
    }

    public function edit(Citizen $citizen)
    {
        $households = Household::with('purok')->get();

        activity()->on($citizen)->log('Edit citizen');


        return view('citizen.edit', compact('households', 'citizen'));
    }

    public function update(Request $request, Citizen $citizen)
    {
        $citizen->update($this->form_data($request));

        activity()->on($citizen)->log('Update citizen');


        return response()->json([
            'title'    => 'Success!',
            'message'  => 'Citizen record has been updated!',
            'intended' => route('citizen.show', $citizen->id),

        ], 201);
    }

    public function destroy(Citizen $citizen)
    {
        $appointments = Appointment::with('medic')->where('citizen_id', $citizen->id);
        foreach ($appointments as $appointment) {
            $appointment->medic->delete();
        }
        $appointments->delete();

        activity()->on($citizen)->log('Delete citizen');


        $citizen->delete();

        return redirect(route('citizen.index'))->with('alert-success', 'Citizen has been removed');
    }

    private function form_data(Request $request): array
    {
        return [
            'household_id' => $request->post('household'),
            'name'         => [
                'first'  => strtoupper($request->post('first_name')),
                'last'   => strtoupper($request->post('last_name')),
                'middle' => strtoupper($request->post('middle_name')),
                'suffix' => $request->post('suffix'),
            ],
            'birthdate'    => $request->post('birthdate'),
            'sex'          => $request->post('sex'),
            'philhealth'   => $request->post('philhealth_number'),
            '4ps'          => ($request->has('4ps')) ? true : false,
            'ips'          => ($request->has('ips')) ? true : false,
            'is_dead'      => ($request->has('dead')) ? true : false,
        ];
    }
}
