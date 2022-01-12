@extends('layouts.index')

@section('page-pretitle', 'Purok')
@section('page-title', 'Purok')


@section('page-action')
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal"><x-ui.icon icon="plus" /> New Purok</button>
@endsection


@section('content')
<x-ui.table.data title="Purok lists">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Households</th>
            <th>Population</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($zones as $zone)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $zone->name }}</td>
                <td>{{ $zone->households_count }}</td>
                <td>{{ $zone->citizens_count }}</td>
                <td>
                    <x-ui.button.view :href="route('purok.show', $zone->id)" />
                </td>
            </tr>
        @endforeach
    </tbody>
</x-ui.table.data>

@include('purok.credit')
@endsection
