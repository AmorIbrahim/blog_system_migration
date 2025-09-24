@forelse($users as $user)
<tr>
    <td>{{ $loop->iteration }}</td>
    {{-- <td>{{ $user->id }}</td> --}}
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td class="d-flex justify-content-center gap-2">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning">✏️</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">🗑️</button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center text-muted">🚫 لا يوجد مستخدمين</td>
</tr>
@endforelse
