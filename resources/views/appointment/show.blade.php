@extends('layouts.index')

@section('page-pretitle', 'Appointments')

@section('page-title')
    {{ ucfirst($appointment->types_type) }} Checkup
@endsection

@section('page-action')
    @if ($appointment->remarks !== null)
        <a href="javascript:window.print();" class="btn btn-primary">
            <x-ui.icon icon="printer" /> Print
        </a>
    @endif
@endsection

@section('content')
    <div class="row row-cards d-print-none">
        <div class="col-3">
            <x-include.citizen :citizen="$appointment->citizen" :appointment="$appointment" />
        </div>

        <div class="col-9">
            <div class="row row-cards">
                <div class="col-12">
                    @include('appointment.switch')
                </div>
                <div class="col-12">
                    <x-ui.table.data title="Past Medical Records">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Remarks</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($appointment->citizen->appointments as $app)

                                <tr @if ($app->id == $appointment->id) class="bg-azure-lt" @endif>
                                    <td>{{ $app->id }}</td>
                                    <td>{{ ucfirst($app->medic_type) }}</td>
                                    <td>{{ $app->schedule->format('F d, Y h:i A') }}</td>
                                    <td>{{ $app->remarks }}</td>
                                    <td>
                                        @if ($app->id !== $appointment->id)
                                            <x-ui.button.view :href="route('appointment.show', $app->id)" />
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </x-ui.table.data>
                </div>
            </div>
        </div>

    </div>

    <div class="row d-none d-print-block">
    {{-- <div class="row"> --}}
        <div class="col-12">
            <table class="table table-bordered">
                <tbody>

                    <tr>
                        <td><strong>LAST NAME:</strong> {{ $appointment->citizen->name['last'] }}</td>
                        <td><strong>FIRST NAME:</strong> {{ $appointment->citizen->name['first'] }}</td>
                        <td><strong>MIDDLE NAME:</strong> {{ $appointment->citizen->name['middle'] }}</td>
                        <td><strong>SUFFIX :</strong> {{ $appointment->citizen->name['suffix'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>HOUSEHOLD:</strong> {{ $appointment->citizen->household->number }}</td>
                        <td><strong>BIRTHDATE:</strong> {{ $appointment->citizen->birthdate }}</td>
                        <td><strong>AGE:</strong> {{ $appointment->citizen->birthdate->age }}</td>
                        <td><strong>SEX:</strong> {{ $appointment->citizen->sex }}</td>
                    </tr>

                    <tr>
                        <td colspan="4">
                            @include('appointment.switch')
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>


@endsection
