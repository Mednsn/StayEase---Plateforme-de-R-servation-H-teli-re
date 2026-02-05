<h2>Liste des Properties</h2>
<ul>
@foreach ($properties as $tag)
<li>{{ $tag->name }}
</li><form action="{{ route('properties.destroy', $tag) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Supprimer</button>
        </form>
@endforeach
<a href="{{ route('properties.create') }}">Ajouter</a>
</ul>
