<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Hôtels en attente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Tableau de bord Admin - Hôtels en attente</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Gérant</th>
                    <th>status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->name }}</td>
                        <td>{{ $hotel->address }}</td>
                        <td>{{$hotel->user->firstname}} {{$hotel->user->lastname}}</td>
                         <td>{{ $hotel->status }}</td>
                        <td>
                        <form action="{{ route('admin.approve', $hotel) }}" method="POST">
                                 @csrf
                                 @method('PUT')
                          <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                        </form>

                        <form action="{{ route('admin.reject', $hotel) }}" method="POST">
                                @csrf
                                 @method('PUT')
                          <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
                        </form>
                        </td>
                    </tr>
              
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
