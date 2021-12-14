<?php

namespace App\Http\Livewire\Household;

use App\Models\Household as HouseholdModel;
use Livewire\Component;

class Household extends Component
{

    public function render()
    {

        $households = HouseholdModel::get();

        return view('household.index', compact('households'))->layoutData([
            '_title' => 'Households'
        ]);
    }
}
