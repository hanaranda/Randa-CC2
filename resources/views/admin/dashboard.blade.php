<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('content')
    <h2>Tableau de bord</h2>
    <p>Bienvenue, {{ Auth::user()->email }}!</p>

   
@endsection
