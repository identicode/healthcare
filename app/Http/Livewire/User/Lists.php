<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Lists extends Component
{

    public function render()
    {
        $accounts = User::get();
        return view('users.lists', compact('accounts'));
    }
}
