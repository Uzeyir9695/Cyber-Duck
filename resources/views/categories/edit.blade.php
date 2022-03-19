@extends('layouts.app')
@section('content')

    <div class="container">
        @include('messages')
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="{{ $category->name }}" name="name">
            </div>
            <div class="form-check">
                <label class="form-check-label" for="active">
                    <input type="radio" class="form-check-input" id="active"value="1" {{ ($category->status === 1) ? 'checked' : '' }} name="status">Active
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="inactive">
                    <input type="radio" class="form-check-input" id="inactive" value="0" {{ ($category->status === 0) ? 'checked' : '' }} name="status">Inactive
                </label>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('categories.index') }}" class="btn btn-primary my-4">Cancel</a>
            </div>
        </form>
    </div>
@endsection
