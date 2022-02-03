<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function login()
    {
        $validated = $this->validate();

        if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'username' => 'Authentication error. Please check your credentials.',
            ]);
        }

        request()->session()->regenerate();

        // saving into sessions
        // $authenticated = Account::with('employee.position', 'employee.division.office')->find(auth()->user()->id);
        // $request->session()->put('authenticated', $authenticated);


        activity()->log('Logged In.');

        session()->flash('welcome_back');
        return redirect(session()->pull('url.intended', route('dashboard')));

    }
    public function render()
    {
        return view('auth.login')->layout('layouts.clean');
    }
}
