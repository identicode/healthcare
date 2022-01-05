@extends('layouts.index')

@section('page-pretitle', 'System')
@section('page-title', 'Users')

@section('content')

    <div class="row">

        <div class="col-5">
            <x-ui.card title="Update User">
                <form id="ajax_form" action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-6">
                            <x-ui.form.input :value="$user->name['first']" label="First Name" name="first_name" required />
                        </div>
                        <div class="col-6">
                            <x-ui.form.input  :value="$user->name['last']" label="Last Name" name="last_name" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-ui.form.input  :value="$user->name['middle']" label="Middle Name" name="middle_name" />
                        </div>
                        <div class="col-6">
                            <x-ui.form.input :value="$user->name['suffix']" label="Suffix" name="suffix" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-ui.form.input label="Birthdate"  :value="$user->birthdate" name="birthdate" type="date" required />
                        </div>
                        <div class="col-6">
                            <x-ui.form.choices label="Role" name="role" required>
                                @foreach ($roles as $role)
                                    <option {{ sh($role->id, $user->roles->first()->id) }}>{{ $role->name }}</option>
                                @endforeach
                            </x-ui.form.choices>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <x-ui.form.input :value="$user->username" label="Username" name="username" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-ui.form.input label="Password" name="password" type="password" />
                        </div>
                        <div class="col-6">
                            <x-ui.form.input label="Password" name="password_confirmation" type="password" />
                        </div>
                    </div>

                    <button class="btn btn-primary mt-2">Save</button>

                </form>
            </x-ui.card>

            <x-include.form.ajax />

        </div>
    </div>

@endsection
