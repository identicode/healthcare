<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('users.index', compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $user = User::create($this->form_data($request));

        $user->assignRole($request->post('role'));

        return response()->json([
            'message'  => 'User has been recorded',
            'title'    => 'Success',
            'intended' => route('users.index'),
        ], 201);
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('users.edit', compact('roles', 'user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($this->form_data($request));
        $user->syncRoles($request->post('role'));

        return response()->json([
            'message'  => 'User has been updated',
            'title'    => 'Success',
            'intended' => route('users.index'),
        ], 201);
    }

    private function form_data(Request $request): array
    {
        $data = [
            'name'      => [
                'first'  => strtoupper($request->post('first_name')),
                'last'   => strtoupper($request->post('last_name')),
                'middle' => strtoupper($request->post('middle_name')),
                'suffix' => strtoupper($request->post('suffix')),
            ],
            'birthdate' => $request->post('birthdate'),
            'username'  => $request->post('username'),
        ];

        if ($request->has('password') AND $request->input('password') != '') {
            $data['password'] = Hash::make($request->post('password'));
        }

        return $data;
    }

}
