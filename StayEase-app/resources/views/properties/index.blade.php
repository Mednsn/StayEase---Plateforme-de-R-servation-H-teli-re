<h2>Liste des Properties</h2>
<ul>
@foreach ($properties as $propertie)
<li>{{ $propertie->name }}</li>
<form action="{{ route('properties.destroy', $propertie) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Supprimer</button>
        </form>
@endforeach
<a href="{{ route('properties.create') }}">Ajouter d'autres Proprietees</a>
</ul>