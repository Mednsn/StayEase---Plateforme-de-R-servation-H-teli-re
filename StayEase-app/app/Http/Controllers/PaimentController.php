<?php

namespace App\Http\Controllers;

use App\Models\Paiment;
use App\Models\Room;
use DATETIME;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

use function Laravel\Prompts\alert;

class PaimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Room::with('tags', 'properties')->where('rooms.id','=',$request->room_id)->first();
        $room_id = $request->room_id;
        $date_in = $request->date_in;
        $date_out = $request->date_out;
        $checkin = new DATETIME($date_in);
        $checkout = new DATETIME($date_out);
          $diff =  $checkout->diff($checkin)->days;
          $total = $query->price_per_night*$diff;
        return view('categories.paiment',compact('query','total','diff','date_in','date_out','room_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function checkout(Request $request)
    {
        echo "wslat hna checkout";exit;
       Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => 'Chambre Deluxe',
                    ],
                    'unit_amount' => $request->prix * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/success'),
            'cancel_url' => url('/cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        return "gjhjhjhjh success";
    }

    public function cancel()
    {
        return "Paiement annulé ❌";
    }


    /**
     * Display the specified resource.
     */
    public function show(Paiment $paiment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paiment $paiment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paiment $paiment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paiment $paiment)
    {
        $paiment->delete();
        return back();
    }
}
