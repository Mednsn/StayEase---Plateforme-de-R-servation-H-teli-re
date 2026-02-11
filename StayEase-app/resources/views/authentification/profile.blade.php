<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>User Profile - StayEase</title>

    <link href="../css/styles.css"  rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="/">StayEase</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('hotels.index') }}">Hôtel</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Profile</a></li>

                    <li class="nav-item ms-3">
                        <form action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">Log out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row align-items-center">

               
                <div class="col-lg-8">
                    <h1 class="text-white fw-bold mb-3">
                        {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                    </h1>

                    <ul class="list-unstyled text-white-50 fs-5">
                        <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
                        <li><strong>Role:</strong> {{ auth()->user()->role->name }}</li>
                        <li>
                            <strong>Status:</strong>
                            <span class="badge bg-{{ auth()->user()->status === 'active' ? 'success' : 'secondary' }}">
                                {{ auth()->user()->status }}
                            </span>
                        </li>
                    </ul>
                </div>

              
                <div class="col-lg-4 text-center d-none d-lg-block">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                         class="rounded-circle"
                         width="180"
                         alt="profile">
                </div>

            </div>
        </div>
    </header>

   
    <section class="py-5">
        <div class="container px-5">
            <h2 class="fw-bold mb-4">My Reservations</h2>

            
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Hotel</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                       
                    </table>
                </div>
         
                <p class="text-muted">You have no reservations yet.</p>
          
        </div>
    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
