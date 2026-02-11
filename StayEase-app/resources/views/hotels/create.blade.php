<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Hôtel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .form-container { max-width: 600px; margin: 50px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h1 class="h3 mb-4 text-center text-primary">Ajouter un nouveau Hôtel</h1>

        <form action="{{ route('hotels.store') }}" method="POST">
            @csrf 
            
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nom de l'hôtel :</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Ex: Hilton Marrakesh" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description :</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Décrivez l'hôtel..."></textarea>
            </div>

              <div class="mb-3">
                <label for="city" class="form-label fw-bold">Ville :</label>
                <input type="text" name="city" id="city" class="form-control"  required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label fw-bold">Adresse :</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Ex: Rue 123" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label fw-bold">image :</label>
                <input type="text" name="image" id="image" class="form-control" placeholder="https://thumbs.dreamstime.com/b/hotel-sign-27516625.jpg" required>
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Enregistrer l'hôtel</button>
                <a href="{{ route('gerant.index') }}" class="btn btn-outline-secondary">Retour à la liste</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>