@extends('layouts.index')

@section('page-pretitle', 'Citizen')
@section('page-title', 'Register Citizen')

@section('content')
<div class="row page-center">
    <div class="col-lg-8">
        <x-ui.card title="New Citizen Form">
            <form action="{{ route('citizen.store') }}" id="ajax_form" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-3"><x-ui.form.input label="Last Name" name="last_name" required /></div>
                    <div class="col-md-3"><x-ui.form.input label="First Name" name="first_name" required /></div>
                    <div class="col-md-3"><x-ui.form.input label="Middle Name" name="middle_name" /></div>
                    <div class="col-md-3"><x-ui.form.input label="Suffix" name="suffix" /></div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <x-ui.form.input label="Birthdate" type="date" name="birthdate" required />
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
                            @foreach($households as $household)
                                <option value="{{ $household->id }}">{{ $household->number }} ({{ strtoupper($household->purok->name) }})</option>
                            @endforeach
                        </x-ui.form.choices>
                    </div>
                    <div class="col">
                        <x-ui.form.choices label="Mother Name" name="mother_name">
                            @foreach($mothers as $mother)
                                <option value="{{ $mother->id }}">{{ name($mother->name) }}</option>
                            @endforeach
                        </x-ui.form.choices>
                    </div>
                </div>

                <label class="form-check form-check-inline">
                    <input class="form-check-input" name="member" type="checkbox">
                    <span class="form-check-label">4Ps / IP Member</span>
                </label>

                <hr>

                <button class="btn btn-primary">Submit</button>


            </form>


        </x-ui.card>
    </div>
</div>

<x-include.form.ajax />
@endsection
