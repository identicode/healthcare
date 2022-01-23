@extends('layouts.index')

@section('page-pretitle', 'Dashboard')
@section('page-title', 'Citizen')

@section('content')
    <div class="row row-cards">

        <div class="col-md-3">
            <x-include.citizen :citizen="$citizen" />
        </div>

        <div class="col-md-9">
            <div class="row row-cards">
                <div class="col-12">
                    <x-ui.table.table title="Medical Records">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Remarks</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($citizen->appointments->where('remarks', '!=', null) as $med)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $med->created_at->format('F d, Y h:i A') }}</td>
                                    <td>{{ $med->remarks }}</td>
                                    <td>
                                        <x-ui.button.view :href="route('appointment.show', $med->id)" />
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="3">NO DATA AVAILABLE</td>
                                </tr>
                            @endforelse
                        </tbody>
                        </x-ui.card>
                </div>

                <div class="col-12">
                    <x-ui.table.table title="Appointments">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Appointment Date</th>
                                <th>Type</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($citizen->appointments->count() == 0)
                                <tr class="text-center">
                                    <td colspan="3">NO DATA AVAILABLE</td>
                                </tr>
                            @else
                                @foreach ($citizen->appointments->sortByDesc('created_at') as $app)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $app->schedule->format('F d, Y h:i A') }}</td>
                                        <td>{{ ucfirst($app->medic_type) }}</td>
                                        <td>
                                            <x-ui.button.view :href="route('appointment.show', $app->id)" />
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </x-ui.table.table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('modal')
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New appointment checkup</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="ajax_form" action="{{ route('appointment.store') }}" method="POST">

                        <input type="hidden" value="{{ $citizen->id }}" name="citizen_id" required />

                        <x-ui.form.input label="Schedule Date" type="datetime-local" name="schedule"
                            value="{{ date('Y-m-d\TH:i') }}" />

                        <label class="form-label">Appointment type</label>
                        <div class="form-selectgroup-boxes row row-cards mb-3">
                            {{-- @if ($citizen->dob->age <= 12)
                                <div class="col-lg-6">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="appointment" value="child" class="form-selectgroup-input"
                                            checked>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Child Checkup</span>
                                                <span class="d-block text-muted">Provide basic data needed for the child
                                                    report</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            @endif --}}

                            @if ($citizen->dob->age >= 12 and $citizen->sex === 'FEMALE')


                                <div class="col-lg-6">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="appointment" value="maternal"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Maternal Checkup</span>
                                                <span class="d-block text-muted">Provide basic data needed for the maternal
                                                    checkup
                                                    report</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>

                            @endif


                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="appointment" value="nutritional"
                                        class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Nutritional Checkup</span>
                                            <span class="d-block text-muted">Provide basic data needed for the nutrition
                                                report</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="appointment" value="others" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Others</span>
                                            <span class="d-block text-muted">Other types of medical checkups and/or another
                                                agendas. </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <label class="form-check form-check-inline">
                            <input class="form-check-input" name="walkin" type="checkbox">
                            <span class="form-check-label">Walk-in</span>
                        </label>

                        <br>

                        <button class="btn btn-primary mt-4">Continue</button>

                    </form>

                </div>

            </div>
        </div>
    </div>

    <x-include.form.ajax />
@endsection
