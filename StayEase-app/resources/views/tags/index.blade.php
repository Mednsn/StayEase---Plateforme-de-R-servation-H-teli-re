<h2>Liste des Tags</h2>
<ul>
@foreach ($tags as $tag)
<li>{{ $tag->name }}</li>
<form action="{{ route('tags.destroy', $tag) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Supprimer</button>
        </form>
@endforeach
<a href="{{ route('tags.create') }}">Ajouter d'autres Tags</a>
</ul>