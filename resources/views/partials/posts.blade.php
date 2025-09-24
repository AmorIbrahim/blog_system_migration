@forelse($posts as $post)
<tr>
    <td>{{ $loop->iteration }}</td>
    {{-- <td>{{ $post->id }}</td> --}}
    <td>{{ Str::limit($post->Title, 30) }}</td>
    <td>{{ $post->user->name ?? 'مجهول' }}</td>
    <td>{{ $post->created_at->diffForHumans() }}</td>
    <td class="d-flex justify-content-center gap-2">
        <a href="{{ route('postsDash.edit', $post->id) }}" class="btn btn-sm btn-outline-warning">✏️</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">🗑️</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center text-muted">🚫 لا يوجد مقالات</td>
</tr>
@endforelse
