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
