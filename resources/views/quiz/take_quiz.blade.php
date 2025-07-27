@extends('layouts.app')

@section('title', 'Take Quiz - ' . $course->name)

@section('content')
<div class="container mt-4">
    <h2>Quiz for Course: {{ $course->name }}</h2>
    <h4>Module ID: {{ $moduleNumber }}</h4>
    <h5>Quiz: {{ $quiz->title ?? 'Quiz' }}</h5>

    @if($questions->count() > 0)
        <form action="{{ route('user.quiz.submit', ['course' => $course->id, 'moduleNumber' => $moduleNumber]) }}" method="POST">
            @csrf

            @foreach($questions as $index => $question)
                <div class="mb-4">
                    <p><strong>Q{{ $index + 1 }}. {{ $question->question_text }}</strong></p>


                    @foreach($question->options as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="option{{ $option->id }}" value="{{ $option->id }}" required>
                            <label class="form-check-label" for="option{{ $option->id }}">
                                {{ $option->option_text }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </form>
    @else
        <p>No questions found for this quiz.</p>
    @endif
</div>
@endsection
