@php
    use App\Helpers\NewsHelper;
@endphp

<h1 style="text-align: center; font-size: 24px; color: #d9534f;">News List</h1>
<ul style="list-style-type: none; padding-left: 0; max-width: 600px; margin: auto;">
    @foreach ($news as $item)
        <li
            style="padding: 15px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('news.show', $item->slug) }}"
                style="font-size: 18px; color: #333; text-decoration: none; font-weight: bold; flex-grow: 1;">
                {{ $item->headline }}
            </a>

            <span style="font-size: 14px; color: #777; margin-right: 15px;">
                Published: {{ NewsHelper::formatDate($item->publish_date) }} | Expires:
                {{ NewsHelper::formatDate($item->expiration_date) ?? 'No Expiration' }}
            </span>

            @superadmin
                <a href="{{ route('news.edit', $item->id) }}"
                    style="color: #d9534f; text-decoration: none; margin-right: 10px;">
                    Edit
                </a>
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
