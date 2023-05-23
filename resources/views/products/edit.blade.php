
@extends('layouts.app-master')

@section('content')
    <h1>Edit Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <style>
            div {
                margin-bottom: 10px;
            }
        
            label {
                display: inline-block;
                width: 100px;
                font-weight: bold;
            }
        
            input[type="text"],
            textarea,
            input[type="number"] {
                width: 300px;
                padding: 5px;
            }
        
            button[type="submit"] {
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                border: none;
                cursor: pointer;
            }
        </style>
        
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" required>{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ $product->price }}" required>
        </div>
        
        
       
        <button type="submit">Update</button>
        
    </form>
@endsection
