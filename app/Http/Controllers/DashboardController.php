<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Purok;
use App\Models\Citizen;
use App\Models\Household;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $now = Carbon::now();
        $apps = Appointment::with('citizen.purok')->whereBetween('schedule', [$now->copy()->startOfDay(), $now->copy()->endOfDay()])->get();


        $counts = [
            'puroks'     => Purok::count(),
            'households' => Household::count(),
            'citizens'   => Citizen::count(),
            'appointments' =>$apps->count()
        ];

        $lists = array();

        foreach(Purok::get() as $purok){
            $lists[] = array('x' => $purok->name, 'y' => $apps->where('citizen.purok.id', $purok->id)->count());
        }

        return view('dashboard', compact('counts', 'lists'));
    }
}
