<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des chambres</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f7fb;
        }

        .navbar {
            background-color: #214ef1;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .btn-primary {
            background-color: #214ef1;
            border: none;
        }

        .btn-primary:hover {
            background-color: #6bb7d6;
        }
    </style>
</head>

<body>

    <div class="container">
        <form method='GET' action='{{ route("rooms.index") }}'>
            <select name='tag'>
                <option value=''>Tous les tags</option>
                @foreach ($allTags as $tag)
                <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                @endforeach
            </select>
            <select name='property'>
                <option value=''>Toutes les propriétés</option>
                @foreach ($allProperties as $prop)
                <option value='{{ $prop->id }}'>{{ $prop->name }}</option>
                @endforeach
            </select>

            <button type='submit'>Filtrer</button>
        </form>
        <div class="row">
            @forelse($rooms as $room)
            <div class="col-md-4 mb-4">
                <div class="card p-3 bg-white">
                    <h5 class="text-secondary">Chambre #{{ $room->number }}</h5>

                    <p><strong>Prix :</strong> {{ $room->price_per_night }} DH / nuit</p>
                    <p><strong>Capacité :</strong> {{ $room->capacity }} personnes</p>

                    <p><strong>Tags :</strong>
                        @foreach($room->tags as $tag)
                        <span class="badge bg-secondary">{{ $tag->name }}</span>
                        @endforeach
                    </p>

                    <p><strong>Propriétés :</strong>
                        @foreach($room->properties as $property)
                        <span class="badge bg-info text-dark">{{ $property->name }}</span>
                        @endforeach
                    </p>

                    <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-primary mt-2">Voir</a>
                </div>
            </div>
            @empty
            <p class="text-center text-muted">Aucune chambre trouvée.</p>
            @endforelse
        </div>
    </div>
</body>
</html>