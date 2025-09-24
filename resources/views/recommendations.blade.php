@extends('layouts.dashboard')

@section('content')
    <h2>Recommended Trainings</h2>

@if($trainings->count() > 0)
@foreach($trainings as $training)
    <div class="training">
        <h4>{{ $training->course_title }}</h4>
        <p>{{ $training->course_description }}</p>
        <small>
            Starts: {{ \Carbon\Carbon::parse($training->start_date)->format('M d, Y') }} <br>
            Ends: {{ \Carbon\Carbon::parse($training->end_date)->format('M d, Y') }}
        </small>
    </div>
@endforeach

@else
    <p>No recommended trainings available at the moment.</p>
@endif

<pre>{{ print_r($raw_recommendations->toArray(), true) }}</pre>

@endsection
