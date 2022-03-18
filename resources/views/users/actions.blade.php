<div class="d-flex justify-content-around">
    <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $row->id ) }}">Edit</a>
    @if(request()->user()->email === 'admin@gmail.com')
        <form action=" {{ route('users.destroy', $row->id) }} " method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    @endif
</div>
