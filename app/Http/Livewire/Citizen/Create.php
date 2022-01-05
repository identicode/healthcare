<?php

namespace App\Http\Livewire\Citizen;

use App\Models\Citizen;
use App\Models\Household;
use Livewire\Component;

class Create extends Component
{
    public $citizen;

    protected $rules = [
        'citizen.name.last'    => ['required', 'string'],
        'citizen.name.first'   => ['required', 'string'],
        'citizen.name.middle'  => ['nullable', 'string'],
        'citizen.name.suffix'  => ['nullable', 'string'],
        'citizen.birthdate'    => ['required', 'date'],
        'citizen.sex'          => ['required'],
        'citizen.philhealth'   => ['nullable'],
        'citizen.household_id' => ['required'],
        'citizen.4ps'          => ['nullable'],
        'citizen.props.mother' => ['nullable'],

    ];

    public function mount()
    {
        $this->citizen = new Citizen();
    }

    public function render()
    {
        $households = Household::get();

        return view('citizen.create', [
            'households' => $households,
        ])->layoutData(['_title' => 'Register Citizen', '_pretitle' => 'Citizens']);
    }

    public function save()
    {
        $this->validate();
        $this->citizen->save();
        return redirect(route('citizen.show', $this->citizen->id));
    }
}
