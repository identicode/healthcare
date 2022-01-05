@extends('layouts.index')

@section('page-pretitle', 'Dashboard')
@section('page-title', 'Households')

@section('page-action')
    <a href="{{ route('household.index') }}?print=1" class="btn btn-primary">
        <x-ui.icon icon="printer" /> Print View Household
    </a>
@endsection

@section('content')
<x-ui.table.data title="Household lists">

    <x-slot name="actions">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal"><x-ui.icon icon="plus" /> New Household</button>
    </x-slot>

    <thead>
        <tr>
            <th>#</th>
            <th>Number</th>
            <th>Members</th>
            <th>Purok</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($households as $household)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $household->number }}</td>
                <td>{{ $household->members_count }}</td>
                <td>{{ $household->purok->name }}</td>
                <td>
                    {{-- <a href="https://google.com/maps/search/{{ $household->coordinates }}" target="_new">
                        View in Maps
                      </a> --}}

                      <a href="{{ route('household.show', $household->id) }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</x-ui.table.data>

@include('household.create')
@endsection
