@extends('layouts.index')

@section('page-pretitle', 'Citizens')
@section('page-title', 'Citizens')

@section('content')
<div class="row">
    <div class="col">
       {{-- <x-ui.table.data-api title="Citizen List">
           <x-slot name="actions">
               <a href="{{ route('citizen.create') }}" class="btn btn-primary">
                   <x-ui.icon icon="user-plus" />Register Citizen
               </a>
           </x-slot>
       </x-ui.table.data-api> --}}

       @livewire('citizen-table')

       {{-- <x-ui.card title="Citizen List">
       </x-ui.card> --}}
    </div>
</div>
@endsection


@push('js-custom')
    <script src="{{ asset('libs/alpine/alpine.min.js') }}"></script>
    <script>
        window.addEventListener('alert-livewire', event => {
            alert(event.detail.message);
        })
    </script>
@endpush
