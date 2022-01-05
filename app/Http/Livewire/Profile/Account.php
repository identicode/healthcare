<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Account extends Component
{
    public $username, $password, $password_confirmation, $password_old;

    protected function rules()
    {
        return [
            'username'     => 'required|unique:users,username,' . auth()->user()->id,
            'password_old' => 'required',
            'password'     => 'nullable|min:5|confirmed',
        ];
    }

    public function mount()
    {
        $this->username = auth()->user()->username;
    }

    public function render()
    {
        return view('profile.account');
    }

    public function save()
    {
        $this->validate();

        if(!Hash::check($this->password_old, auth()->user()->password)){
            return session()->flash('alert-error', 'Invalid old password');
        }

        $user = User::find(auth()->user()->id);
        $user->username = $this->username;

        if(!empty($this->password)){
            $user->password = Hash::make($this->password);
        }

        $user->save();

        return session()->flash('alert-success', 'Account has been updated');
    }
}
