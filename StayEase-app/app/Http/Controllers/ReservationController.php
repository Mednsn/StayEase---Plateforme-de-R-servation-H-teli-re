<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
        ]);
        $date_in = $request->check_in;
        $date_out = $request->check_out;

        $rooms = Room::with(['tags', 'properties'])
            ->whereDoesntHave('reservations', function ($quiry) use ($date_in, $date_out) {
                $quiry->where('check_in', '<', $date_out)
                    ->where('check_out', '>', $date_in);
            })
            ->get();

        $allTags = Tag::all();
        $allProperties = Property::all();
        // dd($rooms);

        return view('rooms.index', compact('rooms', 'allTags', 'allProperties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function checkChambreIsaviable(Request $request)
    {
        echo "rak hna";
        $request->validate([
            'date_in' => 'required',
            'date_out' => 'required',
        ]);
        $date_in = $request->date_in;
        $date_out = $request->date_out;
        $id = $request->room_id;

        $test_check = Room::with(['tags', 'properties'])
            ->where('rooms.id', '=', $id)
            ->whereDoesntHave('reservations', function ($quiry) use ($date_in, $date_out) {
                $quiry->where('check_in', '<', $date_out)
                    ->where('check_out', '>', $date_in);
            })
            ->get();
        if ($test_check) {
            return back()->with('date_in', $date_in)->with('date_out', $date_out);
        } else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $userId = Auth::user();
        $name = 'reserver';
        $total = $request->total;
        $request->validate([
            'date_in' => 'required',
            'date_out' => 'required',
            'room_id' => 'required',
        ]);

        $reservation = Reservation::create([
            'name' => $name,
            'check_in' => $request->date_in,
            'check_out' => $request->date_out,
            'room_id' => $request->room_id,
            'user_id' => 31,
        ]);

        // problemmmmmm
        return redirect()->route('paiement.checkout', ['reservation_id' => $reservation->id,'total'=>$total]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'name' => 'required | max:255',
            'check_in' => 'required',
            'check_out' => 'required',
            'user_id' => 'required',
            'room_id' => 'required',
        ]);
        $reservation->update($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back();
    }
}
