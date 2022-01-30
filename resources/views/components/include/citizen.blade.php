<div class="card">
    <div class="card-body p-4 text-center">

        <span class="avatar avatar-lg mb-3">
            @if($citizen->is_dead)
                <x-ui.icon icon="ghost" />
            @else
            {{ name($citizen->name, 'SYM-FL') }}
            @endif
        </span>
        <h3 class="m-0 mb-3">
            {{ name($citizen->name) }} <br>
            @if($citizen->is_dead) <small class="text-muted">DECEASED</small> @endif
        </h3>

        <div class="btn-group mr-2 d-print-none" role="group" aria-label="First group">
            @if (!Route::is('citizen.show'))
                <a href="{{ route('citizen.show', $citizen->id) }}" type="button" class="btn btn-primary">View</a>
            @endif
            <a href="{{ route('citizen.edit', $citizen->id) }}" type="button" class="btn btn-warning">Edit</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#modal-citizen-delete">Delete</button>
        </div>
    </div>

    <div class="card-body">
        <div class="card-title">Basic info</div>

        <div class="mb-2">
            <x-ui.icon icon="home" class="me-2 text-muted" />
            Household: <strong>{{ $citizen->household->number }}</strong>
        </div>

        <div class="mb-2">
            <x-ui.icon icon="calendar" class="me-2 text-muted" />
            Birthdate: <strong>{{ $citizen->dob->format('F d, Y') }}</strong>
        </div>
        <div class="mb-2">
            <x-ui.icon icon="clock" class="me-2 text-muted" />
            Age: <strong>{{ $citizen->age }}</strong>
        </div>
        <div class="mb-2">
            <x-ui.icon icon="friends" class="me-2 text-muted" />
            Sex: <strong>{{ $citizen->sex }}</strong>
        </div>
    </div>

    @isset($appointment)
        <div class="card-body">
            <div class="card-title">Appointment info</div>
            <div class="mb-2">
                <x-ui.icon icon="report-medical" class="me-2 text-muted" />
                Type: <strong>{{ ucfirst($appointment->medic_type) }}</strong>
            </div>

            <div class="mb-2">
                <x-ui.icon icon="calendar-plus" class="me-2 text-muted" />
                Schedule: <strong>{{ $appointment->schedule->format('F d, Y h:i A') }}</strong>
            </div>
        </div>
    @endisset


    <div class="d-flex d-print-none">
        <a href="{{ route('household.show', [
            'household' => $citizen->household,
            'highlightedMember' => $citizen->id,
        ]) }}"
            class="card-btn">
            <x-ui.icon icon="home" class="me-2 text-muted" />
            Household
        </a>

        @if (Route::is('citizen.show') AND !$citizen->is_dead)

            <a href="#" class="card-btn" data-bs-toggle="modal" data-bs-target="#modal-report">
                <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                <x-ui.icon icon="heart-rate-monitor" class="me-2 text-muted" />
                Checkup
            </a>

        @endif

    </div>

    <div class="modal modal-blur fade" id="modal-citizen-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">


                    <x-ui.icon icon="alert-triangle" class="mb-2 text-danger icon-lg" />
                    <h3>Are you sure?</h3>



                    <div class="text-muted">
                        Informations about citizen's appointment and medical records will be deleted. Do you really want
                        to remove? What you've done cannot be undone.
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                            </div>
                            <div class="col">
                                <form action="{{ route('citizen.destroy', $citizen->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    Delete
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
