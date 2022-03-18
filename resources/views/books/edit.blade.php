@extends('layouts.app')
@section('content')
    <div class="container">
        @include('messages')
        <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category">Choose the category:</label>
                <select class="form-control" id="category" name="category">
                    <option value="" selected disabled>Not chosen</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="{{ $book->name }}" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" rows="5" id="description">{{ $book->description }}</textarea>
            </div>

{{--            <div class="row">--}}
                <img src="{{ $book->getFirstMediaUrl('images') }}" alt="image" width="80" height="50" class="rounded">
{{--            </div>--}}
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image"  name="image">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
