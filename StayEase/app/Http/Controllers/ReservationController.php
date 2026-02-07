<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
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

        $rooms_disponible = DB::table('rooms')
            ->leftJoin('reservations', 'rooms.id', '=', 'reservations.room_id')
            ->select('rooms.*', 'reservations.check_in','reservations.check_out')
            ->where('check_out', '>', $request->check_in)
            ->where('check_in', '>', $request->check_out)
            ->get();

        dd($rooms_disponible);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
