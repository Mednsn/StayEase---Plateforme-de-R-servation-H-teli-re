<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Paiement Réservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>

<body class="nv-body">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="row payment-container">

                    <div class="col-md-5 p-0">

                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945"
                            class="img-fluid hotel-img w-100 h-100"
                            alt="Hotel">
                    </div>

                    <div class="col-md-7 p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="mb-0">Confirmation de réservation</h3>
                            <a href="{{ route('rooms.index') }}" class="btn btn-outline-secondary btn-sm">Retour</a>
                        </div>

                        <hr>

                        <div class="mb-3 d-flex justify-content-between">
                            <span>Prix par nuit</span>
                            <span>{{ $query->price_per_night}} MAD</span>
                        </div>

                        <div class="mb-3 d-flex justify-content-between">
                            <span>Nombre de nuits</span>
                            <span>{{ $diff }}</span>
                        </div>

                        <div class="mb-4 total-box d-flex justify-content-between">
                            <span>Total à payer</span>
                            <span>{{ $total }} MAD</span>
                        </div>

                        <div class="mb-4 ">
                            <form action="{{ route('reservation.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="nbr_jour" value="{{ $diff }}">
                                <input type="hidden" name="date_in" value="{{ $date_in }}">
                                <input type="hidden" name="date_out" value="{{ $date_out }}">
                                <input type="hidden" name="room_id" value="{{ $room_id }}">
                                <input type="hiddin" name="name" value="reservation terminer" disabled><br>
                                <label class="form-label">Mode de paiement</label>
                                <select class="form-select cgap-3">
                                    <option>Paypal</option>
                                    <option>Virement bancaire</option>
                                </select>
                                <div class="col-md-6 width-full mb-2">
                                    <button type="submit" class="btn btn-pay w-100">
                                        Valider le paiement
                                    </button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>

</body>

</html>