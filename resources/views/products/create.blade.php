
@extends('layouts.app-master')
@section('content')
    <h1>Create Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="4" required>{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" name="price" id="price" step="0.01" value="{{ old('price') }}" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" id="category" class="form-control" required>
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <small class="text-muted">If the category is not listed, you can <a href="{{ route('categories.create') }}">add a new category</a>.</small>
            
        </div>
        <br>
        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" name="image" id="image">
        </div><br>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>



@endsection