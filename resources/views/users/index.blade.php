@extends('layouts.app-master')


@section('content')
    <h1>Liste des utilisateurs</h1>

    <a href="{{ route('users.create') }}" class="btn btn-primary">Créer un utilisateur</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Password</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->Password }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
