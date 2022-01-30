@extends('layouts.index')

@section('page-pretitle', 'Citizen')
@section('page-title', 'Update Citizen')

@section('content')
<div class="row page-center">
    <div class="col-lg-8">
        <x-ui.card title="Update Citizen Form">
            <form action="{{ route('citizen.update', $citizen->id) }}" id="ajax_form" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-3"><x-ui.form.input :value="$citizen->name['last']" label="Last Name" name="last_name" required /></div>
                    <div class="col-md-3"><x-ui.form.input :value="$citizen->name['first']" label="First Name" name="first_name" required /></div>
                    <div class="col-md-3"><x-ui.form.input :value="$citizen->name['middle']" label="Middle Name" name="middle_name" /></div>
                    <div class="col-md-3"><x-ui.form.input :value="$citizen->name['suffix']" label="Suffix" name="suffix" /></div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <x-ui.form.input label="Birthdate" :value="$citizen->birthdate->format('Y-m-d')" type="date" name="birthdate" required />
                    </div>
                    <div class="col-md-4">
                       <x-ui.form.select label="Sex" name="sex" required>
                            <option @if($citizen->sex == 'MALE') selected @endif>MALE</option>
                            <option @if($citizen->sex == 'FEMALE') selected @endif>FEMALE</option>
                       </x-ui.form.select>
                    </div>

                    <div class="col-md-4">
                        <x-ui.form.input label="Philhealth Number" :value="$citizen->philhealth" name="philhealth_number" />
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <x-ui.form.choices label="Household - Purok" name="household" required>
                            @foreach($households as $household)
                                <option {{ sh($household->id, $citizen->household_id) }} value="{{ $household->id }}">{{ $household->number }} ({{ strtoupper($household->purok->name) }})</option>
                            @endforeach
                        </x-ui.form.choices>
                    </div>
                    @if($citizen->dob->age <= 16)
                        <div class="col">
                            <x-ui.form.input label="Mother's Name" name="mother_name" :value="$citizen->props['mothersName'] ?? null" />
                        </div>
                    @endif
                </div>

                <label class="form-check form-check-inline">
                    <input class="form-check-input" name="4ps" type="checkbox" @if($citizen['4ps'] === true) checked @endif>
                    <span class="form-check-label">4ps Member</span>
                </label>

                <label class="form-check form-check-inline">
                    <input class="form-check-input" name="ips" type="checkbox" @if($citizen['ips'] === true) checked @endif>
                    <span class="form-check-label">IP Member</span>
                </label>

                <label class="form-check form-check-inline ">
                    <input class="form-check-input" name="dead" type="checkbox" @if($citizen->is_dead) checked @endif>
                    <span class="form-check-label text-danger">Deceased</span>
                </label>

                <hr>

                <button class="btn btn-primary">Submit</button>


            </form>


        </x-ui.card>
    </div>
</div>




<x-include.form.ajax />
@endsection
