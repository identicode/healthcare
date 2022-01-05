@extends('layouts.index')

@section('page-pretitle', 'Purok')
@section('page-title', $purok->name)

@section('page-action')
<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal"><x-ui.icon icon="pencil" /> Edit</button>
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
                                        <a href="{{ route('household.show', $hh->id) }}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-ui.table.data>
                </div>
                <div class="col-12">
                    <x-ui.table.data title="Citizens">
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
                                        <a href="{{ route('citizen.show', $ct->id) }}">View</a>
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
@endsection
