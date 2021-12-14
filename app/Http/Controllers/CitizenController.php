<?php

namespace App\Http\Controllers;

use App\Http\Requests\Citizen\StoreRequest;
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
        $citizen = Citizen::create([
            'household_id' => $request->post('household'),
            'name'         => [
                'first'  => $request->post('first_name'),
                'last'   => $request->post('last_name'),
                'middle' => $request->post('middle_name'),
                'suffix' => $request->post('suffix'),
            ],
            'birthdate'    => $request->post('birthdate'),
            'sex'          => $request->post('sex'),
            'philhealth'   => $request->post('philhealth_number'),
            '4ps'          => ($request->has('member')) ? true : false,
        ]);

        return response()->json([
            'title' => 'Success!',
            'message' => 'Citizen has been registered!'
        ], 201);
    }
}
