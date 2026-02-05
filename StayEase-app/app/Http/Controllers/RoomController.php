<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rooms = Room::with('tags', 'properties')->where('hotel_id', $request->hotel_id)->get();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|integer',
            'number' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);
        $room = Room::create($validated);
        $room->tags()->sync($request->get('tags', []));
        $room->properties()->sync($request->get('properties', []));
        return redirect()->route('rooms.show', $room);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $room->load('tags', 'properties')->with('hotels');
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }
}