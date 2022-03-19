@extends('layouts.app')
@section('content')
    <div class="container">
        @include('messages')
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" value="{{ $user->email }}" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('users.index') }}" class="btn btn-primary my-4">Cancel</a>
        </form>
    </div>
@endsection
