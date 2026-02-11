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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
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

    <!-- <div class="container mt-5">

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

</div> -->
    <div class="container mt-5">
        <div class="card shadow-sm border-0">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Chambre #{{ $room->number }}</h4>
            </div>

            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <div class="bg-secondary" style="height: 250px; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ $room->image }}" class="img-fluid" style="object-fit: cover; height: 100%; width: 100%;" alt="Chambre #{{ $room->number }}">
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Détails de la chambre</h5>
                                <p class="mb-1"><strong>Prix :</strong> {{ $room->price_per_night }} DH / nuit</p>
                                <p class="mb-1"><strong>Capacité :</strong> {{ $room->capacity }} personnes</p>
                                <p class="mb-3"><strong>Description :</strong> {{ $room->description }}</p>

                                <hr>

                                <h6>Tags</h6>
                                <div class="mb-3">
                                    @foreach($room->tags as $tag)
                                    <span class="badge bg-success me-1 mb-1">{{ $tag->name }}</span>
                                    @endforeach
                                </div>

                                <h6>Propriétés</h6>
                                <div class="mb-3">
                                    @foreach($room->properties as $property)
                                    <span class="badge bg-info text-dark me-1 mb-1">{{ $property->name }}</span>
                                    @endforeach
                                </div>

                                <div class="d-flex gap-2 flex-wrap mt-4">
                                    <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Retour</a>

                                    @if(session('date_in'))
                                    <form action="{{ route('paiement.index')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="date_in" value="{{ session('date_in') }}">
                                        <input type="hidden" name="date_out" value="{{ session('date_out') }}">
                                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                                        <button type="submit"  class="btn btn-success">Réserver</button>
                                    </form>
                                    @else
                                    <form action="{{ route('rooms.check-room') }}" method="GET" class="d-flex gap-2 flex-wrap align-items-end">
                                        @csrf
                                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                                        <div class="row g-2">
                                            <div class="col-auto">
                                                <label class="form-label fw-medium">Check in :</label>
                                                <input type="date" name="date_in" class="form-control">
                                            </div>
                                            <div class="col-auto">
                                                <label class="form-label fw-medium">Check out :</label>
                                                <input type="date" name="date_out" class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Check si disponible</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>