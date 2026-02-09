<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails Chambre</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f7fb;
        }
        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .header {
            background-color: #205dce;
            color: white;
            padding: 15px;
            border-radius: 12px 12px 0 0;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card">
        <div class="header">
            <h4>Chambre #{{ $room->number }}</h4>
        </div>

        <div class="card-body bg-white">

            <p><strong>Prix :</strong> {{ $room->price_per_night }} DH / nuit</p>
            <p><strong>Capacité :</strong> {{ $room->capacity }} personnes</p>
            <p><strong>Description :</strong> {{ $room->description }}</p>

            <hr>

            <h6>Tags</h6>
            @foreach($room->tags as $tag)
                <span class="badge bg-secondary">{{ $tag->  name }}</span>
            @endforeach

            <h6 class="mt-3">Propriétés</h6>
            @foreach($room->properties as $property)
                <span class="badge bg-info text-dark">{{ $property->name }}</span>
            @endforeach

            <div class="mt-4">
                <a href="{{ route('rooms.index', ['hotel_id' => $room->hotel_id]) }}" class="btn btn-secondary">Retour</a>
            </div>

        </div>
    </div>

</div>

</body>
</html>
