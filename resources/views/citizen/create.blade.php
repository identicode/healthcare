@extends('layouts.index')

@section('page-pretitle', 'Citizen')
@section('page-title', 'Register Citizen')

@section('content')
    <div class="row page-center">
        <div class="col-lg-8">
            <x-ui.card title="New Citizen Form" x-data="{dob: null, showM: false}">

                <div x-init="$watch('dob', (value) => {

                    var today = new Date();
                    var birthDate = new Date(value);
                    var age = today.getFullYear() - birthDate.getFullYear();
                    var m = today.getMonth() - birthDate.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }

                    if(age <= 18){
                        return showM = true
                    }

                    return showM = false


                })"></div>



                <form action="{{ route('citizen.store') }}" id="ajax_form" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-3">
                            <x-ui.form.input label="Last Name" name="last_name" required />
                        </div>
                        <div class="col-md-3">
                            <x-ui.form.input label="First Name" name="first_name" required />
                        </div>
                        <div class="col-md-3">
                            <x-ui.form.input label="Middle Name" name="middle_name" />
                        </div>
                        <div class="col-md-3">
                            <x-ui.form.input label="Suffix" name="suffix" />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <x-ui.form.input x-model="dob" label="Birthdate" type="date" name="birthdate" required />
                        </div>
                        <div class="col-md-4">
                            <x-ui.form.select label="Sex" name="sex" required>
                                <option>MALE</option>
                                <option>FEMALE</option>
                            </x-ui.form.select>
                        </div>

                        <div class="col-md-4">
                            <x-ui.form.input label="Philhealth Number" name="philhealth_number" />
                        </div>
                    </div>

                    <div class="row">

                        <div class="col">
                            <x-ui.form.choices label="Household - Purok" name="household" required>
                                @foreach ($households as $household)
                                    <option value="{{ $household->id }}">{{ $household->number }}
                                        ({{ strtoupper($household->purok->name) }})</option>
                                @endforeach
                            </x-ui.form.choices>
                        </div>


                        <div class="col" x-show="showM">
                            <x-ui.form.input label="Mother's Name" name="mother_name" />
                        </div>


                    </div>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="4ps" type="checkbox">
                        <span class="form-check-label">4ps Member</span>
                    </label>

                    <label class="form-check form-check-inline">
                        <input class="form-check-input" name="ips" type="checkbox">
                        <span class="form-check-label">IP Member</span>
                    </label>

                    <br>

                    <button class="btn btn-primary mt-2">Submit</button>


                </form>


            </x-ui.card>
        </div>
    </div>

    <x-include.form.ajax />


    @push('js-custom')
    <script src="{{ asset('libs/alpine/alpine.min.js') }}"></script>

@endpush
@endsection



