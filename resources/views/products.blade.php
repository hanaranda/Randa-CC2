@extends('layouts.app-master')

@section('content')

    <table >
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                
               
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    
                   
                </tr>
            @endforeach
            
        </tbody>
    </table>
 

    

@endsection
