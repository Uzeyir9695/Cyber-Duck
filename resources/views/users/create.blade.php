@extends('layouts.app')
@section('content')
    <div class="container">
        @include('messages')
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" value="{{ old('email') }}" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password-confirm">Repeat Password:</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
