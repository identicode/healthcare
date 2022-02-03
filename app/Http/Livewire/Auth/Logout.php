<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        activity()->log('Logged out.');

        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('login'));
    }

    public function render()
    {
        return <<<'blade'
            <a href="javascript:;" wire:click="logout" role="button" class="dropdown-item" >Logout</a>
        blade;
    }
}
