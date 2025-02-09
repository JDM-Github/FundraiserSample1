@extends('layout')

@section('content')
    <h1>Create News</h1>
    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <label>Headline</label>
        <input type="text" name="headline" required>

        <label>Content</label>
        <textarea name="content" required></textarea>

        <label>Publish Date</label>
        <input type="date" name="publish_date" required>

        <label>Expiration Date</label>
        <input type="date" name="expiration_date">

        <button type="submit">Create</button>
    </form>
@endsection
