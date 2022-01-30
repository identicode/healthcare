@extends('layouts.index')

@section('page-title', 'Dashboard')

@section('content')



<div class="row row-cards">
    <div class="col-6">
        <div class="row row-cards">
            <div class="col-6">
                <x-ui.widget icon="map-pin" title="Puroks" :desc="$counts['puroks']" />
            </div>
            <div class="col-6">
                <x-ui.widget icon="users" title="Citizens" :desc="$counts['citizens']" />
            </div>
            <div class="col-6">
                <x-ui.widget icon="home" title="Households" :desc="$counts['households']" />
            </div>
            <div class="col-6">
                <x-ui.widget icon="report-medical" title="Appointment Today" :desc="$counts['appointments']" />
            </div>
        </div>
    </div>
    <div class="col-6">
        <x-ui.card title="Appointments">
            <div id="chart-appointments"></div>
        </x-ui.card>
    </div>
</div>



@endsection


@push('js-lib')
    <!-- Libs JS -->
    <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
@endpush


@push('js-custom')
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-appointments'), {

            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 320,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,

                },
                animations: {
                    enabled: true
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                    dataLabels: {
                        position: 'bottom'
                    }
                }
            },
            dataLabels: {
                enabled: true,
            },
            fill: {
                opacity: 1,
            },
            series: [
                {
                    data: @json($lists),
                }
            ],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
               type: "category"
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: ["#206bc4"],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
  </script>
@endpush
