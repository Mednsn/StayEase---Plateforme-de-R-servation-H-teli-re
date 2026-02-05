<h2>Liste des Tags</h2>
<ul>
@foreach ($tags as $tag)
<li>{{ $tag->name }}</li>
@endforeach
</ul>