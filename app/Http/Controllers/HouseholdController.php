<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\Purok;
use Illuminate\Http\Request;

class HouseholdController extends Controller
{
    public function index()
    {
        if (request()->has('print') and request()->get('print') == true) {

            $puroks = Purok::with('citizens.household', 'households');

            $purok_id = (int)request()->get('purok');

            if($purok_id != 0){
                $puroks->where('id', $purok_id);
            }

            return view('household.printer', [
                'puroks'      => $puroks->get(),
                'report_type' => 'list',
            ]);

        }

        $households = Household::with(['purok', 'members'])->get();
        $puroks     = Purok::get();
        return view('household.index', compact('households', 'puroks'));
    }

    public function show(Household $household)
    {
        $household->load(['members', 'head']);
        $puroks = Purok::get();

        return view('household.show', compact('household', 'puroks'));
    }

    public function update(Household $household, Request $request)
    {
        $household->update([
            'number'      => $request->post('number'),
            'coordinates' => $request->post('coordinates'),
            'purok_id'    => $request->post('purok'),
            'head_id'    => $request->post('head'),
        ]);

        return response()->json([
            'message'  => 'Household has been updated',
            'title'    => 'Success',
            'intended' => route('household.show', $household->id),
        ], 200);
    }

    public function store(Request $request)
    {
        $hh = Household::create([
            'number'      => $request->post('number'),
            'coordinates' => $request->post('coordinates'),
            'purok_id'    => $request->post('purok'),
        ]);

        return response()->json([
            'message'  => 'Household has been recorded.',
            'title'    => 'Success',
            'intended' => route('citizen.create', ['hh' => $hh->id])
        ], 201);
    }

    public function destroy($id)
    {
        $hh = Household::with('members.appointments.medic')->find($id);


        foreach($hh->members as $mm){
            foreach($mm->appointments as $ap){
               $ap->medic()->delete();
            }
            $mm->appointments()->delete();
        }
        $hh->members()->delete();


        $hh->delete();




        return redirect(route('household.index'))->with('alert-success', 'Household has been deleted.');
    }

}
