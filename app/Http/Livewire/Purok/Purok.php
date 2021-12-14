<?php

namespace App\Http\Livewire\Purok;

use App\Models\Purok as Zone;
use Livewire\Component;

class Purok extends Component
{
    public function render()
    {
        $zones = Zone::withCount('households')->get();
        return view('purok.index', compact('zones'))
                ->layoutData([
                    '_title' => 'Purok'
                ]);
    }
}
