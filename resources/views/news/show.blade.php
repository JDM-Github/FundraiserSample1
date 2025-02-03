@extends('layout')

@section('content')
    <h1>{{ $news->title }}</h1>
    <p>{{ $news->content }}</p>
    <a href="{{ route('dashboard') }}">Back</a>
@endsection
