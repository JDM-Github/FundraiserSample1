@extends('layout')

@section('content')
    <h1>News</h1>
    <a href="{{ route('news.create') }}">Create News</a>
    <ul>
        @foreach($news as $item)
            <li>
                <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a>
                <a href="{{ route('news.edit', $item->id) }}">Edit</a>
                <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
