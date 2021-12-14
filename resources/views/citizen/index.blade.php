@extends('layouts.index')

@section('page-pretitle', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col">
       <x-ui.table.data-api title="Citizen List" />
    </div>
</div>
@endsection
