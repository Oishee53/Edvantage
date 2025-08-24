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
    @forelse ($courseProgress as $progress)
        @php
            // Fetch course aggregates (avg & count); better to preload in controller,
            // but this keeps the blade self-contained.
            $course = \App\Models\Courses::select('id','title','avg_rating','rating_count')
                        ->find($progress['course_id']);

            $myRating = \App\Models\Rating::where('course_id', $progress['course_id'])
                        ->where('user_id', auth()->id())
                        ->first();

            $dismissed = class_exists(\App\Models\RatingDismissal::class)
                ? \App\Models\RatingDismissal::where('course_id', $progress['course_id'])
                    ->where('user_id', auth()->id())->exists()
                : false;
        @endphp

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

                {{-- === Rating block (inserted here) === --}}
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        Avg: {{ number_format($course->avg_rating ?? 0, 2) }}
                        ({{ $course->rating_count ?? 0 }} reviews)
                    </small>
                </div>

                @if(!$myRating && !$dismissed)
                    <form method="POST" action="{{ route('courses.rate', $progress['course_id']) }}" class="mt-2">
                        @csrf

                        {{-- Stars --}}
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <div class="star-input">
                                @for($i = 5; $i >= 1; $i--)
                                    <input type="radio"
                                           id="rate-{{ $progress['course_id'] }}-{{ $i }}"
                                           name="score"
                                           value="{{ $i }}" required>
                                    <label for="rate-{{ $progress['course_id'] }}-{{ $i }}">★</label>
                                @endfor
                            </div>
                            <span class="text-muted small">Rate this course</span>
                        </div>

                        <textarea name="comment" rows="2" class="form-control mb-2"
                                  placeholder="(Optional) Say something..."></textarea>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary">Submit</button>
                            <button type="submit" form="skip-form-{{ $progress['course_id'] }}" class="btn btn-light border">
                                Skip
                            </button>
                        </div>
                    </form>

                    {{-- Separate tiny form for skip --}}
                    <form id="skip-form-{{ $progress['course_id'] }}" method="POST"
                          action="{{ route('courses.rate.skip', $progress['course_id']) }}">
                        @csrf
                    </form>
                @else
                    @if($myRating)
                        <div class="mt-2 small text-success">
                            You rated: <strong>{{ $myRating->score }}/5</strong>
                            @if($myRating->comment) • “{{ $myRating->comment }}” @endif
                        </div>
                    @endif
                @endif
                {{-- === /Rating block === --}}

                {{-- Collapsible Quiz Marks --}}
                <div class="collapse mt-3" id="course{{ $progress['course_id'] }}">
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
                        <p class="text-muted mb-0">No quizzes taken yet for this course.</p>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">You are not enrolled in any courses yet.</p>
    @endforelse
</div>

{{-- Star styles (once, outside the loop) --}}
<style>
    .star-input { display:flex; gap:.35rem; direction: rtl; }
    .star-input input { display:none; }
    .star-input label { cursor:pointer; font-size:1.4rem; }
    .star-input label:hover, .star-input label:hover ~ label { color:#f59e0b; }
    .star-input input:checked ~ label { color:#f59e0b; }
</style>
@endsection
