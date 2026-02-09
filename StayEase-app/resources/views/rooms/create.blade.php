<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une chambre</title>
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
            background-color: #87CEEB;
            color: white;
            padding: 15px;
            border-radius: 12px 12px 0 0;
        }
        .btn-primary {
            background-color: #87CEEB;
            border: none;
        }
        .btn-primary:hover {
            background-color: #6bb7d6;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card">
        <div class="header">
            <h4>Ajouter une nouvelle chambre</h4>
        </div>

        <div class="card-body bg-white">

            <form action="{{ route('rooms.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label>Numéro de chambre</label>
                    <input type="text" name="number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Prix par nuit (DH)</label>
                    <input type="number" name="price_per_night" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Capacité</label>
                    <input type="number" name="capacity" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label>Tags</label>
                    <select name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tags</label>
                    <select name="tags[]" class="form-select" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Propriétés</label>
                    <select name="properties[]" class="form-select" multiple>
                        @foreach($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="hotel_id" value="{{ request('hotel_id') }}">

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('rooms.index', ['hotel_id' => request('hotel_id')]) }}" class="btn btn-secondary">Annuler</a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
