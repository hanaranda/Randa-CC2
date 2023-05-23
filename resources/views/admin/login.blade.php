<!-- resources/views/admin/login.blade.php -->

@extends('layouts.admin')

@section('content')
    <h2>Connexion</h2>

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" required autofocus>
        </div>

        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Se connecter</button>
    </form>
@endsection
