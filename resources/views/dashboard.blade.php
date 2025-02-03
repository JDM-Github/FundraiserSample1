@extends('layout')

@section('content')

    @fundraiser
        <h1>Fundraiser Dashboard</h1>
    @endfundraiser

    @adminonly
        <h1>Admin Dashboard</h1>
    @endadminonly

    @superadmin
        <h1>Super Admin Dashboard</h1>
    @endsuperadmin

    <h2>All News</h2>
    @admin
        <a href="{{ route('news.create') }}">ADD NEWS</a>
    @endadmin

    <h1 style="text-align: center; font-size: 24px; color: #d9534f;">News List</h1>

    <ul style="list-style-type: none; padding-left: 0;">
        @foreach ($news as $item)
            <li style="padding: 10px 0; border-bottom: 1px solid #ddd;">
                <a href="{{ route('news.show', $item->id) }}"
                    style="font-size: 18px; color: #333; text-decoration: none; font-weight: bold;">
                    {{ $item->title }}
                </a>

                @superadmin
                    <span style="margin-left: 15px;">
                        <a href="{{ route('news.edit', $item->id) }}" style="color: #d9534f; text-decoration: none;">Edit</a>
                    </span>
                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="background-color: #d9534f; color: white; border: none; padding: 5px 10px; font-size: 14px; border-radius: 4px; cursor: pointer;">
                            Delete
                        </button>
                    </form>
                @endsuperadmin
            </li>
        @endforeach
    </ul>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection
