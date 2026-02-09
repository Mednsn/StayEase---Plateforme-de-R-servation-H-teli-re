<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
        ]);
        $date_in = $request->check_in;
        $date_out = $request->check_out;

        $checkin  = new DateTime($date_in);
        $checkout = new DateTime($date_out);

        $nbrJours = $checkout->diff($checkin)->days;

        $rooms_disponible = DB::table('rooms')
            ->whereNotIn('id', function ($join) use ($date_in, $date_out) {
                $join->select('room_id')
                ->from('reservations')
                ->where('check_in', '<', $date_out)
                ->where('check_out', '>', $date_in);
            })->get();


        // dd($rooms_disponible);

        return view('categories.checkRooms', compact('rooms_disponible', 'date_in', 'date_out'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'require | max:255',
            'check_in' => 'require',
            'check_out' => 'require',
            'user_id' => 'require',
            'room_id' => 'require',
        ]);
        Reservation::created($validated);

        return back();
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
            'name' => 'require | max:255',
            'check_in' => 'require',
            'check_out' => 'require',
            'user_id' => 'require',
            'room_id' => 'require',
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
