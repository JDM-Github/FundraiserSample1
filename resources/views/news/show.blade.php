@extends('layout')

@section('content')
    <h1>{{ $news->headline }}</h1>
    <p><strong>Published on:</strong> {{ $news->publish_date }}</p>
    <p><strong>Expires on:</strong> {{ $news->expiration_date ?? 'No Expiration' }}</p>
    <p>{{ $news->content }}</p>
    
    <a href="{{ route('dashboard') }}">Back</a>
@endsection
