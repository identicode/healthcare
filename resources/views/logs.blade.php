@extends('layouts.index')

@section('page-title', 'Activity Logs')

@section('content')
<div class="row row-cards">
    <div class="col-12">
        <x-ui.table.data title="Activities">
            <thead>
                <th>Date</th>
                <th>Name</th>
                <th>Description</th>
                <th>Subject</th>
                <th>Cause</th>
                <th>Properties</th>
            </thead>
            <tbody>
                @foreach(Spatie\Activitylog\Models\Activity::all() as $log)
                    <tr>
                        <td>{{ $log->created_at }}</td>
                        <td>{{ $log->log_name }}</td>
                        <td>{{ $log->description }}</td>
                        <td>{{ json_encode($log->subject, JSON_PRETTY_PRINT) }}</td>
                        <td>{{ name($log->causer->name) }}</td>
                        <td>{{ json_encode($log->properties, JSON_PRETTY_PRINT) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </x-ui.table.data>
    </div>
</div>
@endsection

