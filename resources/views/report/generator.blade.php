@extends('layouts.index')

@section('page-pretitle', 'Reports')
@section('page-title')
{{ $data['type'] }} from {{ $start->format('F d, Y') }} to {{ $end->format('F d, Y') }}
@endsection

@section('page-action')

<button type="button" class="btn btn-primary" onclick="javascript:window.print();">
    <!-- Download SVG icon from http://tabler-icons.io/i/ -->
    <x-ui.icon icon="printer" />
    Print Reports
</button>

@endsection

@section('content')
<div class="card card-lg">
    <div class="card-body">
        @switch($data['type'])
            @case('Age Report')
                @include('report.age')
                @break
            @case('Child Growth Report')
                @include('report.child.growth')
                @break
            @case('Nutrition Weight Status Report')
                @include('report.nutrition.weight')
                @break
            @case('Child Vaccine Report')
                @include('report.child.vaccine')
                @break
                @case('Child Vitamins Report')
                @include('report.child.vitamins')
                @break
            @default

        @endswitch
    </div>
  </div>
@endsection
