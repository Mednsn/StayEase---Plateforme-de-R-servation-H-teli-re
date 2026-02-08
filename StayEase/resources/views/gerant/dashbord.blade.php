<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="d-flex">

    <div class="bg-dark text-white p-3 min-vh-100 d-none d-md-block" style="width:250px;">
        <div class="fs-5 fw-bold mb-4 text-center text-uppercase"> Gerant Panel</div>
        <hr class="text-secondary">

        <div class="nav flex-column gap-2">
            <a href="{{ route('admin.index') }}" class="nav-link text-white small opacity-75">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard Gerant
            </a>

            <div class="text-secondary small fw-bold text-uppercase mt-3 mb-1" style="font-size:0.7rem;">
                Management
            </div>

            <a href="{{ route('gerant.index') }}" class="nav-link text-white small opacity-75">
                <i class="bi bi-building me-2"></i> Mes Hôtels
            </a>
        </div>
    </div>

    <div class="flex-grow-1 p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold text-secondary">Mes Hôtels</h1>
             <a href="{{ route('hotels.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Créer un hôtel
            </a>
            <a href="{{route('auth.logout')}}" class="btn btn-danger shadow-sm">LOGOUT</a>
        </div>

        <nav class="mb-4 bg-white p-3 rounded shadow-sm border">
            <span class="text-muted fw-bold">Dashboard / Mes Hôtels</span>
        </nav>

        <div class="card shadow border-0">
            <div class="card-header bg-light border-bottom">
                <h6 class="fw-bold text-primary mb-0">
                    <i class="bi bi-table me-2"></i> Liste des Hôtels
                </h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr class="text-uppercase small fw-bold text-secondary">
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>description</th>
                                <th>City</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                           <tbody>
                            @foreach($hotels as $hotel)
                            <tr>
                                <td class="fw-bold">{{ $hotel->name }}</td>
                                <td>{{ $hotel->address }}</td>
                                <td>{{ $hotel->description}}</td>
                                <td>{{ $hotel->city}}</td>
                                <td>{{ $hotel->status }} </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{route('hotels.edit',$hotel)}}">
                                          <a href="{{ route('hotels.edit', $hotel) }}" class="btn btn-sm btn-info"> <i class="bi bi-arrow-repeat"></i> </a>
                                        <form action="{{ route('hotels.destroy', $hotel) }}"    method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
