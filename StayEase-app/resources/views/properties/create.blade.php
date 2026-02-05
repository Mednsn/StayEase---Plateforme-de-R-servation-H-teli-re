<h1>Ajouter une proprietee</h1>
<form method="POST" action="{{ route('properties.store') }}">
    @csrf
    <label>Name</label>
    <input type="text" name="name" required>
    <button>Ajouter</button>
</form>