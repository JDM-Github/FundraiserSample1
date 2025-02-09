@extends('layout')

@section('content')
    <h1>Edit News</h1>
    <form action="{{ route('news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Headline</label>
        <input type="text" name="headline" value="{{ $news->headline }}" required>

        <label>Content</label>
        <textarea name="content" required>{{ $news->content }}</textarea>

        <label>Publish Date</label>
        <input type="date" name="publish_date" value="{{ $news->publish_date }}" required>

        <label>Expiration Date</label>
        <input type="date" name="expiration_date" value="{{ $news->expiration_date }}">

        <button type="submit">Update</button>
    </form>
@endsection
