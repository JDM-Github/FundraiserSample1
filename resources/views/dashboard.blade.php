@extends('layout')

@section('content')

    @include('layout.header')

    <h2 style="text-align: center; color: #d9534f;">All News</h2>

    @admin
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="{{ route('news.create') }}" 
                style="background-color: #d9534f; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                ADD NEWS
            </a>
        </div>
    @endadmin

    @include('news.list', ['news' => $news])
    <div style="text-align: center; margin-top: 20px;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" 
                style="background-color: #d9534f; color: white; padding: 10px 15px; border-radius: 5px; font-size: 16px; cursor: pointer;">
                Logout
            </button>
        </form>
    </div>

@endsection
@include('footer')
