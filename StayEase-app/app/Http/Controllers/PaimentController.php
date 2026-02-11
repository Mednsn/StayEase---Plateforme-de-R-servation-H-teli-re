<?php

namespace App\Http\Controllers;

use App\Models\Paiment;
use App\Models\Room;
use DATETIME;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe;

use function Laravel\Prompts\alert;

class PaimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Room::with('tags', 'properties')->where('rooms.id', '=', $request->room_id)->first();
        $room_id = $request->room_id;
        $date_in = $request->date_in;
        $date_out = $request->date_out;
        $checkin = new DATETIME($date_in);
        $checkout = new DATETIME($date_out);
        $diff =  $checkout->diff($checkin)->days;
        $total = $query->price_per_night * $diff;
        return view('categories.paiment', compact('query', 'total', 'diff', 'date_in', 'date_out', 'room_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store($reservation_id, $total)
    {
        // echo "wslat hna store";exit;
        //
        $mode = 'virement bancaire';
        Paiment::create([
            'mode_paiement' => $mode,
            'price_paiment' => $total,
            'reservation_id' => $reservation_id,
        ]);
        return redirect()->route('rooms.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function checkout($reservation_id, $total)
    {
        // dd($reservation_id,$total);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $name = 'chambre #210';
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => $name,
                    ],
                    'unit_amount' => $total * 100,
                ],
                'quantity' => 1,
            ]],
            "mode" => 'payment',
            "success_url" => route('success', [$reservation_id, $total], true),
            "cancel_url"  =>  route('cancel', [], true)
        ]);

        return redirect($session->url);
    }



    /**
     * Display the specified resource.
     */
    public function cancel()
    {
        return "kayn problem";
    }
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
