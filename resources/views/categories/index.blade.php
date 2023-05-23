
<style>
    h1 {
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .alert {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f5f5f5;
        font-weight: bold;
        text-align: left;
    }

    td {
        text-align: center;
    }

    a {
        color: #333;
        text-decoration: none;
        margin-right: 10px;
    }

    button {
        padding: 5px 10px;
        background-color: #f44336;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #c62828;
    }
</style>

<h1>Liste des catégories</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Actions</th><th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}">Modifier</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('categories.create') }}">Ajouter une catégorie</a>
