@extends('layouts.index')

@section('page-pretitle', 'System')
@section('page-title', 'Profile')

@section('content')



<div class="row row-cards">
    @livewire('profile.info')
    @livewire('profile.account')
 </div>

@endsection
