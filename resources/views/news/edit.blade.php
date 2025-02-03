@extends('layout')

@section('content')
    <h1>Edit News</h1>
    <form action="{{ route('news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Title</label>
        <input type="text" name="title" value="{{ $news->title }}">
        <label>Content</label>
        <textarea name="content">{{ $news->content }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection
