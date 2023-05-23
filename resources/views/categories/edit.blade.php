
<h1>Modifier la catégorie</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">
    </div>
    <button type="submit">Modifier</button>
</form>

<a href="{{ route('categories.index') }}">Retour à la liste des catégories</a>
