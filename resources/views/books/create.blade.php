@extends('layouts.app')
@section('content')
    <div class="container">
        @include('messages')
        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="category">Choose the category:</label>
                <select class="form-control" id="category" name="category">
                    <option value="" selected disabled>Not chosen</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" rows="5" id="description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('books.index') }}" class="btn btn-primary my-4">Back</a>
        </form>
    </div>
@endsection
