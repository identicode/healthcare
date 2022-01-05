@extends('layouts.index')

@section('page-pretitle', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col">
       <x-ui.table.data-api title="Citizen List">
           <x-slot name="actions">
               <a href="{{ route('citizen.create') }}" class="btn btn-primary">
                   <x-ui.icon icon="user-plus" />Register Citizen
               </a>
           </x-slot>
       </x-ui.table.data-api>
    </div>
</div>
@endsection
