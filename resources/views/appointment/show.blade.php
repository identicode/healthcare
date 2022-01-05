@extends('layouts.index')

@section('page-pretitle', 'Appointments')
@section('page-title')
    {{ ucfirst($appointment->types_type) }} Checkup
@endsection

@section('content')
    <div class="row row-cards">
        <div class="col-md-3">
            <x-include.citizen :citizen="$appointment->citizen" :appointment="$appointment" />
        </div>
        <div class="col-md-9">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        @if (request()->has('assessment') and request()->get('assessment') == true)
                            @include('appointment.assessment')
                        @else
                            @if ($appointment->remarks == null)
                                <x-ui.card title="Assessment Details" class="text-center">
                                    <h1>ASSESSMENT DETAILS NOT FOUND</h1>
                                    @hasrole('medic|admin')
                                    <a href="?assessment=1" class="btn btn-primary btn-lg mt-4">
                                        <x-ui.icon icon="pencil" /> ASSESS
                                    </a>
                                    @endhasrole
                                </x-ui.card>
                            @else
                                @switch($appointment->medic_type)
                                    @case('nutritional')
                                        @include('appointment.types.nutritional')
                                    @break

                                    @case('maternal')
                                        @include('appointment.types.maternal')
                                    @break

                                    @default
                                        @include('appointment.types.others')

                                    @break
                                @endswitch
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
