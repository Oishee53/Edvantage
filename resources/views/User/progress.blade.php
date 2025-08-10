@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Header --}}
    <header class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Dashboard</h1>
        <div class="d-flex align-items-center">
            <p class="mb-0 me-3">Welcome, {{ explode(' ', auth()->user()->name)[0] }}</p>
            <form id="logout-form" action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </div>
    </header>

    {{-- Courses List --}}
    @forelse($courseProgress as $progress)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                {{-- Course Title (clickable) --}}
                <h4 class="card-title">
                    <a data-bs-toggle="collapse" href="#course{{ $progress['course_id'] }}" class="text-decoration-none">
                        {{ $progress['course_name'] }}
                    </a>
                </h4>

                {{-- Video Progress --}}
                <p class="card-text mb-2">
                    Completed Videos: {{ $progress['completed_videos'] }} / {{ $progress['total_videos'] }}
                </p>
                <div class="progress mb-3" style="height: 20px;">
                    <div class="progress-bar" role="progressbar" 
                        style="width: {{ $progress['completion_percentage'] }}%;" 
                        aria-valuenow="{{ $progress['completion_percentage'] }}" 
                        aria-valuemin="0" aria-valuemax="100">
                        {{ $progress['completion_percentage'] }}%
                    </div>
                </div>

                {{-- Collapsible Quiz Marks --}}
                <div class="collapse" id="course{{ $progress['course_id'] }}">
                    <h6>📋 Quiz Marks:</h6>
                    @if(count($progress['quiz_marks']) > 0)
                        <ul class="list-group">
                            @foreach($progress['quiz_marks'] as $quiz)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $quiz['quiz_title'] }}
                                    <span class="badge bg-primary rounded-pill">{{ $quiz['score'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No quizzes taken yet for this course.</p>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">You are not enrolled in any courses yet.</p>
    @endforelse
</div>
@endsection
