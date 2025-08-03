@extends('layouts.app')

@section('title', 'Your Course Progress')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📊 Course Progress</h2>

    @if(count($courseProgress) > 0)
        @foreach($courseProgress as $progress)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">{{ $progress['course_name'] }}</h4>
                    <p class="card-text">
                        Completed Videos: {{ $progress['completed_videos'] }} / {{ $progress['total_videos'] }}
                    </p>
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $progress['completion_percentage'] }}%;" aria-valuenow="{{ $progress['completion_percentage'] }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $progress['completion_percentage'] }}%
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>You haven't enrolled in any courses or watched any videos yet.</p>
    @endif
</div>
@endsection
