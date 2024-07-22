@extends('layouts.master')

@section('content')
<h1>Schedule</h1>
<table>
    <thead>
        <tr>
            <th>Teacher</th>
            <th>Classroom</th>
            <th>Timeslot</th>
            <th>Day</th>
        </tr>
    </thead>
    <tbody>
        @foreach($schedules as $schedule)
        <tr>
            <td>{{ $schedule->teacher->name }}</td>
            <td>{{ $schedule->classroom->name }}</td>
            <td>{{ $schedule->timeslot->start_time }} - {{ $schedule->timeslot->end_time }}</td>
            <td>{{ $schedule->day }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
