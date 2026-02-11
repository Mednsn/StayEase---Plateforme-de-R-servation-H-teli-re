<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des chambres</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f7fb;
        }

        .navbar {
            background-color: #214ef1;
        }

        .aligne {
            display: flex;
            padding: 15px;
            justify-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            border-radius: 8px;
            border-bottom: 1px solid;
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

    <nav class="navbar navbar-light mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1 text-white">Gestion des Chambres</span>
            <a href="{{ route('rooms.create', ['hotel_id' => request('hotel_id')]) }}" class="btn btn-light">+ Ajouter</a>
        </div>
    </nav>

    <div class="container">
        <div class="aligne">


            <form action="{{ route('rooms.index') }}" method="GET">

                <div class="row">
                    <div class="mb-3">
                        <select name='tag'>
                            <option value=''>Tous les tags</option>
                            @foreach ($allTags as $tag)
                            <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <select name='property'>
                            <option value=''>Toutes les propriétés</option>
                            @foreach ($allProperties as $prop)
                            <option value='{{ $prop->id }}'>{{ $prop->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 fw-semibold">Filtrer</button>
            </form>
            <div >
                <h6> 📋 check des chambres disponible :</h6>
                <form action="{{ route('rooms.reservation') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label fw-medium">Check in :</label>
                            <input type="date" name="check_in" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium">Check out :</label>
                            <input type="date" name="check_out" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-semibold">Chercher</button>
                </form>
            </div>
        </div>
        <div class="row">
            @forelse($rooms as $room)

            <div class="col-md-4 p-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="rounded bg-secondary d-flex align-items-center justify-content-center" style="height: 250px;">

                    </div>

                    <div class="card-body bg-light">
                        <h5 class="card-title text-primary">Chambre #{{ $room->number }}</h5>

                        <p class="card-text mb-1"><strong>Prix :</strong> {{ $room->price_per_night }} DH / nuit</p>
                        <p class="card-text mb-2"><strong>Capacité :</strong> {{ $room->capacity }} personnes</p>

                        <p class="mb-1"><strong>Tags :</strong>
                            @foreach($room->tags as $tag)
                            <span class="badge bg-success">{{ $tag->name }}</span>
                            @endforeach
                        </p>

                        <p class="mb-2"><strong>Propriétés :</strong>
                            @foreach($room->properties as $property)
                            <span class="badge bg-info text-dark">{{ $property->name }}</span>
                            @endforeach
                        </p>

                        <a href="{{ route('rooms.show',$room->id) }}" class="btn btn-primary btn-sm w-100">Voir</a>
                    </div>
                </div>
            </div>

            @empty
            <p class="text-center text-muted">Aucune chambre trouvée.</p>
            @endforelse
        </div>
    </div>
</body>

</html>