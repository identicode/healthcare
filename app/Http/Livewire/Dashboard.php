<?php

namespace App\Http\Livewire;

use App\Models\Citizen;
use App\Models\Household;
use App\Models\Purok;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $counts = [
            'puroks' => Purok::count(),
            'households' => Household::count(),
            'citizens' => Citizen::count(),
        ];
        return view('dashboard', compact('counts'))
                ->layoutData(['_title' => 'Dashboard']);
    }
}
