<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Hotels - Start Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100 bg-light">
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">StayEase</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="py-5">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <form action="{{ route('hotels.index') }}" method="GET" class="card p-4 shadow border-0">
                                <div class="row align-items-end g-3">
                                <div class="col-md-9">
                                    <label class="form-label fw-bold text-muted small text-uppercase" >Name of Hotel</label>
                                     <input type="text" name="serch" class= "form-control bg-light" placeholder= "name hotel">
                                  </div>
                                  <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                                        <i class="bi bi-filter"></i> Search
                                    </button>
                                </div>
                                 </div>
                            <div class="row align-items-end g-3">
                                <div class="col-md-9">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Filter by City</label>
                                    <select name="city" class="form-select border-0 bg-light">
                                        <option value="">All Cities</option>
                                        @foreach($hotels as $hotel)
                                            <option value="{{$hotel->city}}">
                                                {{$hotel->city}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                                        <i class="bi bi-filter"></i> Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <section class="pb-5">
            <div class="container px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">List of Hotels</h2>
                </div>
                
                <div class="row gx-5">
                    @foreach($hotels as $hotel)
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0 overflow-hidden">
                                <img class="card-img-top" src="{{$hotel->image}}" alt="image de hotel" />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">New</div>
                                    <h5 class="card-title mb-3 fw-bold">{{ $hotel->name }}</h5>
                                    <p class="card-text mb-0 text-muted small">{{ $hotel->description}}</p>
                                    <div >
                                     <i class="bi bi-geo-alt text-danger me-2"></i>
                                    <p class="card-text mb-0 text-muted small fw-bold text-muted">Ville : {{ $hotel->city}}</p>
                                    </div>

                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="small fw-bold text-muted">{{ $hotel->address }}</div>
                                    </div>
                                    
                                    <form action="{{ route('rooms.index') }}" method="GET">
                                        <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                                        <button type="submit" class="btn btn-outline-dark btn-sm w-100">Voir Chambres</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-3 mb-5">
                    {{$hotels->links('pagination::bootstrap-5') }}
                </div>

              
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>