<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Citizen;
use App\Models\Household;
use App\Models\Purok;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $now = Carbon::now();

        $counts = [
            'puroks'     => Purok::count(),
            'households' => Household::count(),
            'citizens'   => Citizen::count(),
            'appointments' => Appointment::whereBetween('schedule', [$now->copy()->startOfDay(), $now->copy()->endOfDay()])->count()
        ];
        return view('dashboard', compact('counts'))
            ->layoutData(['_title' => 'Dashboard']);
    }
}
