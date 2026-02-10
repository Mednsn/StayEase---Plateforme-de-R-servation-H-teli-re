<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin - Hôtels en attente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body class="bg-light">

    <div class="d-flex">
       <aside class="bg-dark text-white p-3 min-vh-100 d-none d-md-block" style="width: 250px;">
            <div class="fs-5 fw-bold mb-4 text-center text-uppercase">
                <i class="bi bi-emoji-laughing-fill me-2 text-warning"></i>StayEase
            </div>
            <hr class="text-secondary">
            
            <div class="nav flex-column gap-2">
                <a href="{{ route('admin.index') }}" class="nav-link text-white small opacity-75 text-decoration-none p-2">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <div class="text-secondary small fw-bold text-uppercase mt-3 mb-1" style="font-size: 0.7rem;">Interface</div>
                <a href="{{route('admin.index')}}" class="nav-link text-white small opacity-75 d-flex justify-content-between text-decoration-none p-2">
                    <span><i class="bi bi-building me-2"></i> Hôtels</span>
                    <i class="bi bi-chevron-right small"></i>
                </a>
                <a href="{{route('categories.index')}}" class="nav-link text-white small opacity-75 d-flex justify-content-between text-decoration-none p-2">
                    <span><i class="bi bi-tags me-2"></i> Categories</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <a href="{{route('admin.user')}}" class="nav-link text-white small opacity-75 d-flex justify-content-between text-decoration-none p-2">
                    <span><i class="bi bi-people me-2"></i> user</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
            </div>
        </aside>

        <div class="flex-grow-1 p-4">
            
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 fw-bold text-secondary">Hôtels en attente</h1>
            </div>

            <nav class="mb-4 bg-white p-3 rounded shadow-sm border">
                <span class="text-muted fw-bold">Dashboard / Hotels En Attente</span>
            </nav>

            <div class="card shadow border-0 mb-4">
                <div class="card-header py-3 bg-light border-bottom">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-table me-2"></i>Pending List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-light">
                                <tr class="text-secondary small text-uppercase fw-bold">
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Gérant</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hotels as $hotel)
                                    <tr>
                                        <td class="fw-bold">{{ $hotel->name }}</td>
                                        <td>{{ $hotel->address }}</td>
                                        <td>
                                            <div class="small fw-bold">{{ $hotel->user->firstname }} {{ $hotel->user->lastname }}</div>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill small">
                                                <i class="bi bi-clock-history me-1"></i> {{ $hotel->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <form action="{{ route('admin.approve', $hotel) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success btn-sm px-3 shadow-sm border-0">
                                                        <i class="bi bi-check-circle me-1"></i> Approuver
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.reject', $hotel) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger btn-sm px-3 shadow-sm border-0">
                                                        <i class="bi bi-x-circle me-1"></i> Rejeter
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