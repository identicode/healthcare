@extends('layouts.index')

@section('page-pretitle', 'System')
@section('page-title', 'Users')

@section('content')



<div class="row row-cards">
    <div class="col-7">
        @livewire('user.lists')
    </div>
    <div class="col-5">
        @include('users.create')
    </div>
</div>


@endsection

