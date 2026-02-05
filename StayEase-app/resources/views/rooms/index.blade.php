<!DOCTYPE html>
<html>
<head>
    <title>Liste des Chambres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h1 class="mb-4">Liste des Chambres</h1>

    <div class="row">
        @foreach ($rooms as $room)
            <div class="col-md-4">
                <div class="card p-3 mb-3 shadow-sm">

                    <h4>Chambre {{ $room->number }}</h4>
                    <p><strong>Prix :</strong> {{ $room->price_per_night }} €/nuit</p>
                    <p><strong>Capacité :</strong> {{ $room->capacity }}</p>

                    <div class="mb-2">
                        @foreach ($room->tags as $tag)
                            <span class="badge bg-primary">{{ $tag->name }}</span>
                        @endforeach
                    </div>

                    <div class="mb-2">
                        @foreach ($room->properties as $property)
                            <span class="badge bg-secondary">
                                {{ $property->icon }} {{ $property->name }}
                            </span>
                        @endforeach
                    </div>

                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-outline-primary mt-2">
                        Voir détails
                    </a>

                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
