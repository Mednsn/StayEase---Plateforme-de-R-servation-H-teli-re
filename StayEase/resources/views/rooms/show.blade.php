<!DOCTYPE html>
<html>
<head>
    <title>Détails Chambre</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h1>Chambre {{ $room->number }}</h1>

    <div class="card p-3 mb-3">
        <p><strong>Prix :</strong> {{ $room->price_per_night }} €/nuit</p>
        <p><strong>Capacité :</strong> {{ $room->capacity }} personnes</p>
        <p><strong>Description :</strong> {{ $room->description }}</p>
    </div>

    <h3>Tags</h3>
    @foreach ($room->tags as $tag)
        <span class="badge bg-primary">{{ $tag->name }}</span>
    @endforeach

    <h3 class="mt-3">Propriétés</h3>
    @foreach ($room->properties as $property)
        <span class="badge bg-secondary">
            {{ $property->icon }} {{ $property->name }}
        </span>
    @endforeach

    <div class="mt-4">
        <a href="{{ route('hotels.index') }}" class="btn btn-dark">⬅ Retour</a>
    </div>

</body>
</html>
