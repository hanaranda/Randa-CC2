@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        
            <nav>
                <ul>
                    <li><a href="{{ route('accueil') }}">Accueil</a></li>
                    <li><a href="{{ route('Products') }}">Products</a></li>
                    <li><a href="{{ route('panier') }}">Panier</a></li>
                    <li><a href="{{ route('commandes') }}">Commandes</a></li>
                    <li><a href="{{ route('moncompte') }}">Mon compte</a></li>
                    
                </ul>
            </nav>

        <h1>Découvrez notre boutique en ligne et trouvez les Products de qualité que vous recherchez</h1>
        <p class="lead">Access to this section is restricted to authenticated users only.</p>
       
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection