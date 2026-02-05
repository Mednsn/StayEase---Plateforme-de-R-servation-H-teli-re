<h1>Ajouter un tag</h1>
<form method="POST" action="{{ route('tags.store') }}">
    @csrf
    <label>Name</label>
    <input type="text" name="name" required>
    <button>Ajouter</button>
</form>