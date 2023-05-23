
@extends('layouts.app-master')

@section('content')

    <h1>Product List</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a><br><br><br>
    <a href="{{ route('users.index') }}"
     style="display: inline-block;display: flex;
    justify-content: center;align-items: center; padding: 10px; background-color: #f2f2f2; color: #333; text-decoration: none; border-radius: 4px; ">Voir la liste des utilisateurs</a><br>
 
 <div class="card-body">
    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import products Data</button>
    </form>

<a class="btn btn-warning float-end" href="{{ route('products.export') }}">Export product Data</a><br>




    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="product">
                    <img src="{{ asset('public/produits/'.$product->image) }}" alt="Image du produit" style="width: 200px; height: 200px; object-fit: cover;">
                    <h2>{{ $product->name }}</h2><br>
                    <p>{{ $product->description }}</p>
                    <p>{{ $product->category->name }}</p>
                    
                    <p>Price: {{ $product->price }}DH</p>
                   
                    
                    <div class="btn-group">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                       
              


                    </div>
                </div>
            </div>
        @endforeach
    </div>
 
    




   

    
@endsection
