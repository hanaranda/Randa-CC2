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

    form {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button[type="submit"] {
        padding: 5px 10px;
        background-color: #3490dc;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #2779bd;
    }

    a {
        color: #333;
        text-decoration: none;
        margin-top: 10px;
        display: inline-block;
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
        background-color: #f9f9f9;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f5f5f5;
    }
</style>

<h1>Ajouter une catégorie</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
    </div>
    <button type="submit">Ajouter</button>
    @if (session('category_created'))
            <div class="alert alert-success">
                {{ session('category_created') }}
            </div>
            <a href="{{ route('products.create') }}" class="btn btn-secondary">Back to Product Creation</a>
             @endif
</form>

<a href="{{ route('categories.index') }}">Retour à la liste des catégories</a>
