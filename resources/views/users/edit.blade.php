
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

    <form action="{{ route('users.update', $user->id) }}" method="POST">
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
            <label for="username">username:</label>
            <input type="text" name="username" id="username" value="{{ $user->username }}" required>
        </div>
        <div>
            <label for="email">email:</label>
            <input name="email" id="email" rows="4" value="{{$user->email }}" >
        </div>
        
        
       
        <button type="submit">Update</button>
        
    </form>
@endsection
