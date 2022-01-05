@extends('layouts.index')

@section('page-pretitle', 'Appointments')
@section('page-title')
{{ ucfirst($appointment->types_type) }} Checkup
@endsection

@section('content')
    <div class="row row-cards">
        <div class="col-md-3">
            <x-include.citizen :citizen="$citizen" />
        </div>
        <div class="col-md-9">

        </div>
    </div>
@endsection
