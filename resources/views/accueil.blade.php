@extends('layouts.app-master')

@section('content')

<style>
    nav {
        background-color: #fffff3;
        padding: 10px;
        margin-bottom: 20px;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    nav ul li {
        display: inline;
        margin-right: 10px;
    }

    nav ul li a {
        text-decoration: none;
        color: #0a0909;
        font-weight: bold;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    p {
        font-size: 16px;
        line-height: 1.5;
    }
    .center-text {
        text-align: center;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/71b7145720.js" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<nav>
    <ul>
      


<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
    @yield('content')
</div>
  
@yield('scripts')


  
        <li><a href="{{ route('accueil') }}">Accueil</a></li>
       
       
       
       
        
        <li>
            
            <a class="btn btn-outline-dark" href="{{ route('shopping.cart') }}">
                <i class="fas fa-cart-shopping"></i> Cart
                <span class="badge bg-danger">
                    {{ count((array) session('cart')) }}
                </span>
            </a>
        </li>
        
        <li><a href="{{ route('commandes') }}">Commandes</a></li>
     
        <li><form style="margin-left: 74%" class="d-flex"  action="{{ route('search') }}" method="GET" >
            <input class="form-control me-2" type="text" name="search" placeholder="Name" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit" >Rechercher</button>
          </form><br></li>
          <form style="margin-left: 2%;margin-top: -55px" class="d-flex" action="{{ route('searchByPrice') }}" method="GET">
            <input class="form-control me-2" type="text" name="minPrice" placeholder="Prix minimum"><br>
            <input class="form-control me-2" type="text" name="maxPrice" placeholder="Prix maximum"><br>
            <button class="btn btn-outline-primary"type="submit">Rechercher</button>
        </form><br><br><br>
          
          
          
    </ul>
 

        <div style="text-align: center; font-weight: bold; font-style: italic; font-size: 24px;">
    Notre boutique en ligne offre une variété de <span style="font-family: 'Rancho', cursive; color: #f5afaf;">t-shirts de football</span> de haute qualité. Trouvez le t-shirt parfait pour montrer votre passion pour le football et soutenir votre équipe favorite.
</div><br><br><br>


<style>
    .add-to-cart-button {
        background-color:rgb(252, 235, 0);
        color: rgb(24, 20, 20);
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        cursor: pointer;
        border-radius: 5px;
    }

    .add-to-cart-button:hover {
        background-color:rgb(245, 233, 69);
    }
    .product-table {
        width: 100%;
        border-collapse: collapse;
    }

    .product-table th,
    .product-table td {
        font-size: 20px;
        color :rgb(58, 55, 18); 
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .product-table th {
        background-color: #f2f2f2;
    }

    .product-table img {
        max-width: 100px;
        height: auto;
    }
    .form-control{
        background-color: #fff4f4;
        width: 150px;
        display: flex;
    align-items: center;
    }
  

</style>
  <div class="row">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('public/produits/'.$product->image) }}" alt="Image du produit" style="height: 200px; width: auto;">
                </div>
                
                    
                    <div class="product-details">
                        <h4 class="product-title">{{ $product->name }}</h4>
                        <p class="product-description">{{ $product->description }}</p>
                        
                        <p class="product-price">Price: {{ $product->price }}DH</p>
                        <p class="product-category">Category: {{ $product->category->name }}</p>
                       <a href="{{ route('addProduct.to.cart', $product->id) }}" class="add-to-cart-button">Add to cart</a><br><br>
                    </div>
            </div>
        </div>
        
    @endforeach
    
</div>



    

@endsection
