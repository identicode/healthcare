<x-ui.card title="Checkup Form">
    <form id="ajax_form" action="{{ route('appointment.assess', $appointment->id) }}" method="POST">
        @csrf

        @switch($appointment->medic_type)
            @case('maternal')
                @include('appointment.types.maternal')
                @break

            @case('nutritional')
                @include('appointment.types.nutritional')
                @break
            @break
        @endswitch

        <div class="row">
            <div class="col-12">
                <x-ui.form.textarea label="Diagnosis / Remarks" name="remarks" />
            </div>
        </div>

        <button class="btn btn-primary mt-2">Submit</button>
    </form>
</x-ui.card>

<x-include.form.ajax />
