@extends('layouts.index')

@section('page-pretitle', 'Households')
@section('page-title', $household->number)

@section('page-action')
<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal"><x-ui.icon icon="pencil" /> Edit</button>
<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete"><x-ui.icon icon="trash" /> Delete</button>
@endsection


@section('content')
    <div class="row row-cards">
        <div class="col-md-4">
            <div class="row row-cards">
                <div class="col-12">
                    <x-ui.card title="Household Details">
                        <div class="mb-2">
                            <x-ui.icon icon="location" class="me-2 text-muted" />
                            Purok: <strong>{{ $household->purok->name }}</strong>
                        </div>
                        <div class="mb-2">
                            <x-ui.icon icon="users" class="me-2 text-muted" />
                            Members: <strong>{{ $household->members->count() }}</strong>
                        </div>
                        <div class="mb-2">
                            <x-ui.icon icon="user-circle" class="me-2 text-muted" />
                            Head: <strong>{{ name($household->head?->name) }}</strong>
                        </div>
                    </x-ui.card>
                </div>
                <div class="col-12">
                    <x-include.map :geo="$household->geo" />
                </div>
            </div>
        </div>
        <div class="col">
            <x-ui.table.table title="Household Members">


                <x-slot name="actions">
                    <a href="{{ route('citizen.create', [
                        'hh' => $household->id
                    ]) }}" class="btn btn-primary">
                       <x-ui.icon icon="user-plus" /> New Member
                    </a>
                </x-slot>




                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Birthday</th>
                        <th>Sex</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($household->members->count() == 0)
                        <tr><td class="text-center" colspan="6"><h2>NO MEMBERS FOUND</h2></td></tr>
                    @else
                    @foreach ($household->members->sortBy('is_dead') as $member)

                        <tr class="
                        @if (request()->get('highlightedMember') == $member->id) bg-azure-lt animate__animated animate__flash @endif
                        @if($member->is_dead) bg-red-lt @endif
                        ">

                            <td class="w-1">
                                <span class="avatar avatar-sm">
                                    @if($member->is_dead)
                                        <x-ui.icon icon="ghost" />
                                    @else
                                        {{ name($member->name, 'SYM-FL') }}
                                    @endif
                                </span>
                            </td>

                            <td>{{ name($member->name) }}</td>

                            <td>{{ $member->age }}</td>
                            <td>{{ $member->birthdate->format('F d, Y') }}</td>
                            <td>{{ $member->sex }}</td>
                            <td>
                                <x-ui.button.view :href="route('citizen.show', $member->id)" />

                            </td>


                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </x-ui.table.table>
        </div>
    </div>


@include('household.edit')
@include('household.delete', ['id' => $household->id])
@endsection
