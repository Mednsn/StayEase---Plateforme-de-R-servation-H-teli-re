<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Hôtel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Modifier Hôtel</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('hotels.update', $hotel) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom de l'hôtel :</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description :</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ $hotel->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">Ville :</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $hotel->city }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Adresse :</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $hotel->address }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Adresse :</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $hotel->address }}" required>
                        </div>
                         <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Adresse :</label>
                            <input type="text" name="image" id="image" class="form-control" placeholder="https://thumbs.dreamstime.com/b/hotel-sign-27516625.jpg" value="{{ $hotel->image }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('gerant.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle me-1"></i> Retour
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle me-1"></i> Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
