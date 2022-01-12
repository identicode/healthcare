<?php

namespace App\Http\Controllers;

use App\Models\Purok;
use Illuminate\Http\Request;

class PurokController extends Controller
{
    public function index()
    {
        $zones = Purok::withCount('households', 'citizens')->get();
        return view('purok.index', compact('zones'));
    }

    public function show(Purok $purok)
    {
        return view('purok.show', compact('purok'));
    }

    public function store(Request $request)
    {
        $purok = Purok::create([
            'name'      => $request->post('name'),
        ]);

        return response()->json([
            'message'  => 'Purok has been recorded',
            'title'    => 'Success',
            'intended' => route('purok.show', $purok->id),
        ], 201);
    }

    public function update(Purok $purok, Request $request)
    {
        $purok->update([
            'name'      => $request->post('name'),
        ]);

        return response()->json([
            'message'  => 'Purok has been updated',
            'title'    => 'Success',
            'intended' => route('purok.show', $purok->id),
        ], 200);
    }

    public function destroy(Purok $purok)
    {
        $purok->load('households.members.appointments.medic');

        foreach($purok->households as $hh){
            foreach($hh->members as $mm){
                foreach($mm->appointments as $ap){
                   $ap->medic()->delete();
                }
                $mm->appointments()->delete();
            }
            $hh->members()->delete();
        }
        $purok->households()->delete();
        $purok->delete();

        return redirect(route('purok.index'))->with('alert-success', 'Purok has been deleted.');
    }
}
