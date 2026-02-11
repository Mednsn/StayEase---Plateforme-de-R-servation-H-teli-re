<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin - Categories</title>
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

        <main class="flex-grow-1 p-4">
            
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 fw-bold text-secondary text-uppercase">Gestion des Catégories</h1>
            </div>

            <nav class="mb-4 bg-white p-3 rounded shadow-sm border">
                <span class="text-muted fw-bold">Dashboard / Categories</span>
            </nav>

            <div class="card shadow border-0 mb-4">
                <div class="card-header py-3 bg-white border-bottom">
                    <h6 class="m-0 fw-bold text-primary">Ajouter une nouvelle catégorie</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-9">
                            <input type="text" name="name" placeholder="ex: suites, luxe..." class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-plus-lg"></i> Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow border-0 mb-4">
                <div class="card-header py-3 bg-light border-bottom">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-table me-2"></i>Liste des catégories</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr class="text-secondary small text-uppercase">
                                    <th class="px-4">#id</th>
                                    <th>Nom</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($categories))
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td class="px-4 text-muted fw-bold">#{{ $category->id }}</td>
                                        <td>
                                            <form action="{{ route('categories.update', $category) }}" method="POST" class="d-flex gap-2">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="name" value="{{ $category->name }}" class="form-control form-control-sm shadow-sm" style="max-width: 250px;">
                                                <button type="submit" class="btn btn-success btn-sm px-3">
                                                    <i class="bi bi-arrow-repeat"></i> Update
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Safi tmse7?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-outline-danger btn-sm px-3 border-0">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
