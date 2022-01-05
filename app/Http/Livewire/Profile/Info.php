<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use App\Models\Worker;
use Livewire\Component;

class Info extends Component
{
    public $name, $birthdate;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->birthdate = auth()->user()->birthdate;
    }

    public function render()
    {
        return view('profile.info');
    }

    public function save()
    {
        $user = User::find(auth()->user()->id);

        $user->update([
            'name' => $this->name,
            'birthdate' => $this->birthdate
        ]);

        return session()->flash('alert-success', 'Profile has been updated');
    }
}
