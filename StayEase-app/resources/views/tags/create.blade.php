<form method="POST" action="{{ route('tags.store') }}">
    @csrf
    <label>Name</label>
    <input type="text" name="name">
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>