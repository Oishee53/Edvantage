@extends('layouts.app')

@section('title', 'Quiz Result')

@section('content')
<div class="container mt-4">
    <h2>Quiz Result: {{ $quiz->title }}</h2>
    <p>You scored: <strong>{{ $submission->score }} out of {{ $quiz->questions->count() }}</strong></p>
</div>
@endsection

