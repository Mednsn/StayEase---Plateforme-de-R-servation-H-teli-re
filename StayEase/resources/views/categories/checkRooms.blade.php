<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Available Rooms</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h4 class="mb-4 fw-bold text-dark">
        Sélectionner les dates afin de trouver des chambres disponibles :
    </h4>

    <div class="row g-4">
        <!-- Form à gauche -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('room.check-rooms') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-medium">Check in :</label>
                            <input type="date" name="check_in" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium">Check out :</label>
                            <input type="date" name="check_out" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-semibold">Chercher</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Results à droite -->
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    @isset($rooms_disponible)
                        <h5 class="fw-bold mb-4 text-primary">{{ $date_in }} ==>> {{ $date_out }}</h5>
                        <div class="row g-3">
                            @foreach ($rooms_disponible as $room)
                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100 hover-shadow">
                                        <h6 class="fw-semibold">Room ID: {{ $room->id }}</h6>
                                        <p class="mb-1 text-secondary">Number: {{ $room->number }}</p>
                                        <p class="mb-1 text-secondary">Check-in: {{ $room->capacity }}</p>
                                        <p class="mb-0 text-secondary">Price: {{ $room->price_per_night }} MAD/night</p>
                                        <p class="mb-1 text-secondary">Check-out: {{ $room->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .hover-shadow:hover {
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: 0.3s;
    }
</style>

</body>
</html>
