@extends('layouts.index')

@section('page-pretitle', 'Purok')
@section('page-title', $purok->name)

@section('page-action')
<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal"><x-ui.icon icon="pencil" /> Edit</button>
<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-purok-delete"><x-ui.icon icon="trash" /> Delete</button>
@endsection

@section('content')
    <div class="row row-cards">
        <div class="col-md-4">
            <div class="row row-cards">
                <div class="col-12">
                    <x-ui.widget icon="home" title="Households" :desc="$purok->households->count()" />
                </div>

                <div class="col-12">
                    <x-ui.widget icon="users" title="Populations" :desc="$purok->citizens->count()" />
                </div>

                <div class="col-6">
                    <x-ui.widget icon="users" title="Male" :desc="$purok->citizens->where('sex', 'MALE')->count()" />
                </div>
                <div class="col-6">
                    <x-ui.widget icon="users" title="Female" :desc="$purok->citizens->where('sex', 'FEMALE')->count()" />
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row row-cards">
                <div class="col-12">
                    <x-ui.table.data title="Households">

                        <x-slot name="actions">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-create-household"><x-ui.icon icon="plus" /> New Household</button>
                        </x-slot>

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Number</th>
                                <th>Members</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purok->households as $hh)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hh->number }}</td>
                                    <td>{{ $hh->members->count() }}</td>
                                    <td>
                                        <x-ui.button.view :href="route('household.show', $hh->id)" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-ui.table.data>
                </div>
                <div class="col-12">
                    <x-ui.table.data title="Citizens">
                        <x-slot name="actions">
                            <a href="{{ route('citizen.create') }}" class="btn btn-primary btn-sm">
                                <x-ui.icon icon="plus" /> New Citizen
                            </a>
                        </x-slot>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Age</th>
                                <th>Sex</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purok->citizens as $ct)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ name($ct->name) }}</td>
                                    <td>{{ $ct->dob->format('F d, Y') }}</td>
                                    <td>{{ $ct->dob->age }}</td>
                                    <td>{{ $ct->sex }}</td>
                                    <td>
                                        <x-ui.button.view :href="route('citizen.show', $ct->id)" />
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </x-ui.table.data>
                </div>
            </div>
        </div>
    </div>


@include('purok.credit', ['isUpdating' => true])
@include('purok.delete', ['id' => $purok->id])
@include('household.create', ['__purok' => $purok])
@endsection
