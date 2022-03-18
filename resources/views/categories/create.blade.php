@extends('layouts.app')
@section('content')

    <div class="container">
        @include('messages')
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name">
            </div>
            <div class="form-check">
                <label class="form-check-label" for="active">
                    <input type="radio" class="form-check-input" id="active" value="1" name="status">Active
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="inactive">
                    <input type="radio" class="form-check-input" id="inactive" value="0" name="status">Inactive
                </label>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
