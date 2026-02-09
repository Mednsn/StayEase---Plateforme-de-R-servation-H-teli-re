<form method="POST" action="{{ route('properties.store') }}">
    @csrf
    <label>Name</label>
    <input type="text" name="name">
    <label>Icon</label>
    <input type="url" name="icon">
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>