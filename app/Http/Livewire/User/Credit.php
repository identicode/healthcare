<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Credit extends Component
{
    public $name, $dob, $username, $password, $password_confirm, $role;
    public $isEdit = false;

    protected $listeners = ['editUserAction' => 'edit'];

    public function render()
    {
        return view('users.credit');
    }

    public function edit($id)
    {
        dd($id);
        $this->isEdit = true;
    }
}
