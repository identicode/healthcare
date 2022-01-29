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

        $counts = [
            'puroks'     => Purok::count(),
            'households' => Household::count(),
            'citizens'   => Citizen::count(),
            'appointments' => Appointment::whereBetween('schedule', [$now->copy()->startOfDay(), $now->copy()->endOfDay()])->count()
        ];




        return view('dashboard', compact('counts'));
    }
}
