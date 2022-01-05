@extends('layouts.index')

@section('page-pretitle', 'Households')
@section('page-title', 'Household Reports')

@section('page-action')

    <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
        <!-- Download SVG icon from http://tabler-icons.io/i/ -->
        <x-ui.icon icon="printer" />
        Print Household
    </button>

@endsection

@section('content')
    <div class="card card-lg">
        <div class="card-body">

            @if($report_type == 'list')
                @include('household.report.lists')
            @endif

        </div>
    </div>
@endsection
