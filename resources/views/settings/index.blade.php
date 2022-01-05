@extends('layouts.index')

@section('page-title', 'System')

@section('content')
<div class="row gx-lg-4">

    @include('settings.navigation')

    <div class="col-lg-9">
      @include('settings.views')
    </div>
  </div>
@endsection
