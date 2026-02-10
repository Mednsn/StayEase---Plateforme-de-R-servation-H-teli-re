<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Tag;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Room::with('tags', 'properties')->where('hotel_id', $request->hotel_id);

        if ($tagId = $request->get('tag')) {
            $query->whereHas('tags', fn($q) => $q->where('tags.id', $tagId));
        }

        if ($propertyId = $request->get('property')) {
            $query->whereHas('properties', fn($q) => $q->where('properties.id', $propertyId));
        }

        $rooms = $query->get();
        $allTags = Tag::all();
        $allProperties = Property::all();

        return view('rooms.index', compact('rooms', 'allTags', 'allProperties'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::where("user_id", Auth::id())->get();
        $categories = Category::all();
        $tags = Tag::all();
        $properties = Property::all();
        return view('rooms.create', compact('tags', 'properties', 'categories', 'hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required',
            'number' => 'required',
            'price_per_night' => 'required',
            'capacity' => 'required',
            'description' => 'nullable',
        ]);

        $room = Room::create($validated);
        $room->tags()->sync($request->get('tags', []));
        $room->properties()->sync($request->get('properties', []));
        return redirect()->route('gerant.chombre', $room);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $room->load('tags', 'properties', 'hotel');
        return view('rooms.show', compact('room'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $room = Room::where('id', $id)->first();
        $hotels = Hotel::where("user_id", Auth::id())->get();
        $categories = Category::all();
        $tags = Tag::all();
        $properties = Property::all();
        return view('rooms.edit', compact('room', 'tags', 'properties', 'categories', 'hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'hotel_id' => 'required',
            'number' => 'required',
            'price_per_night' => 'required',
            'capacity' => 'required',
            'description' => 'nullable',
        ]);
        $room->update($request->all());
        $room->tags()->sync($request->get('tags', []));
        $room->properties()->sync($request->get('properties', []));

        return redirect()->route('gerant.chombre');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $room = Room::where('id', $id)->first();
        $room->delete();
        return redirect()->route('gerant.chombre');
    }
}
