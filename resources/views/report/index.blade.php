@extends('layouts.index')

@section('page-title', 'Analytics')

@section('content')
    <div class="row row-cards">
        <div class="col-12">
            <x-ui.card title="Analytics Generator">
                <form action="{{ route('report') }}" method="GET">

                    <input type="hidden" name="generate" value="1">

                    <x-ui.form.choices label="Analytics Target" name="target" required>
                        <option value="age">Age Distribution</option>
                        <option value="child_growth">Child Growth</option>
                        <option value="child_vaccine">Child Vaccine</option>
                        <option value="child_vitamins">Child Vitamins</option>
                        <option value="household">Households</option>
                        <option value="nutrition_weight">Nutrition Weight Status</option>
                    </x-ui.form.choices>

                    <div class="row">
                        <div class="col-6">
                            <x-ui.form.input label="Start Date" name="start" type="date" required />
                        </div>
                        <div class="col-6">
                            <x-ui.form.input label="End Date" name="end" type="date" required />
                        </div>

                    </div>

                    <button class="btn btn-primary mt-2">
                        Generate
                    </button>

                </form>
            </x-ui.card>
        </div>
    </div>
@endsection
