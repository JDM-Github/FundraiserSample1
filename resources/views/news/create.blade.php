@extends('layout')

@section('content')
    <h1>Create News</h1>
    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <label>Title</label>
        <input type="text" name="title">
        <label>Content</label>
        <textarea name="content"></textarea>
        <button type="submit">Create</button>
    </form>
@endsection
