@extends('layouts.index')

@section('page-pretitle', 'Appointments')
@section('page-title', 'Appointments')

@section('content')
<div class="row">
    <div class="col">
       <x-ui.table.data title="Citizen List">
           <x-slot name="actions">
               <a href="{{ route('citizen.create') }}" class="btn btn-primary">
                   <x-ui.icon icon="user-plus" />Register Citizen
               </a>
           </x-slot>

           <thead>
               <tr>
                   <th>#</th>
                   <th>Name</th>
                   <th>Type</th>
                   <th>Date</th>
                   <th>Actions</th>
               </tr>
           </thead>

           <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ name($appointment->citizen->name) }}</td>
                        <td>{{ ucfirst($appointment->medic_type) }}</td>
                        <td>{{ $appointment->schedule->format('F d, Y h:i A') }}</td>
                        <td>
                            <a href="{{ route('appointment.show', $appointment->id) }}">View</a>
                        </td>
                    </tr>
                @endforeach
           </tbody>

       </x-ui.table.data>
    </div>
</div>
@endsection
