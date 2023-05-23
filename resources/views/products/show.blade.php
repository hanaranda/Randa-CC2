
@extends('layouts.app-master')

@section('content')
    <h1>Product Details</h1>

    <div>
        <strong>Name:</strong> {{ $product->name }}
    </div>
    <div>
        <strong>Description:</strong> {{ $product->description }}
    </div><br>
    <div>
    <img src="{{ asset('public/produits/'.$product->image) }}" alt="Image du produit" style="width: 400px; height: auto; object-fit: cover;">
</div><br>

    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
    </form>
@endsection
