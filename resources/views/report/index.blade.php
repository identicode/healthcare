@extends('layouts.index')

@section('page-title', 'Reports & Analytics')

@section('content')
    <div class="row row-cards">
        <div class="col-6">
            <x-ui.card title="Analytics Generator">
                <form action="{{ route('report') }}" method="GET" x-data="{ target: 'none' }">


                    <input type="hidden" name="generate" value="1">

                    <x-ui.form.choices x-model="target" label="Analytics Target" name="target" required>
                        <option value="age">Age Distribution</option>
                        <option value="household">Households</option>
                        <option value="nutrition_weight">Nutrition Weight Status</option>
                    </x-ui.form.choices>

                    <x-ui.form.choices label="Purok Target" name="purok" required>
                        <option value="all" selected>All</option>
                        @foreach ($puroks as $purok)
                            <option value="{{ $purok->id }}">{{ $purok->name }}</option>
                        @endforeach
                    </x-ui.form.choices>

                    <div class="mb-3" x-show="target != 'household' ">
                        <label class="form-label mb-4">Age Range</label>
                        <input id="analyticsInput" type="hidden" name="age" value="">
                        <div class="form-range mb-2 px-4" id="analyticsRange"></div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-6">
                            <x-ui.form.input label="Start Date" name="start" type="date" required />
                        </div>
                        <div class="col-6">
                            <x-ui.form.input label="End Date" name="end" type="date" required />
                        </div>
                    </div> --}}

                    <button class="btn btn-primary mt-2">
                        Generate
                    </button>

                </form>
            </x-ui.card>
        </div>
        <div class="col-6">
            <x-ui.card title="Report Generator">
                <form action="{{ route('report') }}" method="GET" x-data="{ target: 'none' }">

                    <input type="hidden" name="generate" value="1">

                    <x-ui.form.choices x-model="target" label="Report Target" name="target" required>
                        <option value="child_growth">Child Growth</option>
                        <option value="child_vaccine">Child Vaccine</option>
                        <option value="child_vitamins">Child Vitamins</option>
                    </x-ui.form.choices>

                    <x-ui.form.choices label="Purok Target" name="purok" required>
                        <option value="all" selected>All</option>
                        @foreach ($puroks as $purok)
                            <option value="{{ $purok->id }}">{{ $purok->name }}</option>
                        @endforeach
                    </x-ui.form.choices>

                    <div class="mb-3">
                        <label class="form-label mb-4">Age Range</label>
                        <input id="reportInput" type="hidden" name="age" value="">
                        <div class="form-range mb-2 px-4" id="report-age-range"></div>
                    </div>

                    <div class="row" x-show="target == 'child_growth' ">
                        <div class="col-6">
                            <x-ui.form.input label="Start Date" name="start" type="date" />
                        </div>
                        <div class="col-6">
                            <x-ui.form.input label="End Date" name="end" type="date" />
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


@push('js-lib')
    <script src="{{ asset('libs/nouislider/dist/nouislider.min.js') }}"></script>
    <script src="{{ asset('libs/nouislider/dist/mergingTooltips.js') }}"></script>
    <script src="{{ asset('libs/alpine/alpine.min.js') }}"></script>
@endpush

@push('js-custom')
    <script>
        const analyticsDOM = document.getElementById('analyticsRange')
        const analyticsInput = document.getElementById('analyticsInput')
        const analyticsSlider = noUiSlider.create(analyticsDOM, {
            start: [0, 100],
            connect: [false, true, false],
            tooltips: [true, true],
            step: 1,
            range: {
                min: 0,
                max: 100
            },
            format: {
                to: (v) => v | 0,
                from: (v) => v | 0
            }
        });

        mergeTooltips(analyticsDOM, 15, ' - ');

        //define initial hidden input value with slider value
        analyticsInput.value = analyticsSlider.get()

        //update hidden input value on slider change
        analyticsSlider.on("change", function() {
            analyticsInput.value = analyticsSlider.get()
        });
    </script>
    <script>
        const reportDOM = document.getElementById('report-age-range')
        const reportInput = document.getElementById('reportInput')
        const reportSlider = noUiSlider.create(reportDOM, {
            start: [0, 100],
            connect: [false, true, false],
            tooltips: [true, true],
            step: 1,
            range: {
                min: 0,
                max: 100
            },
            format: {
                to: (v) => v | 0,
                from: (v) => v | 0
            }
        });

        mergeTooltips(reportDOM, 15, ' - ');

        //define initial hidden input value with slider value
        reportInput.value = reportSlider.get()

        //update hidden input value on slider change
        reportSlider.on("change", function() {
            reportInput.value = reportSlider.get()
        });
    </script>
@endpush
