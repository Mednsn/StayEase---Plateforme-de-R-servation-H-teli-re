<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use App\Models\Tag;
use App\Models\Property;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Room::with('tags', 'properties');

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
        $categories = Category::all();
        $tags = Tag::all();
        $properties = Property::all();
        return view('rooms.create', compact('tags', 'properties', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $validated = $request->validate([
            'hotel_id' => 'required',
            'category_id' => 'required',
            'number' => 'required',
            'price_per_night' => 'required',
            'capacity' => 'required',
            'description' => 'nullable',
        ]);

        $room = Room::create($validated);
        $room->tags()->sync($request->get('tags', []));
        $room->properties()->sync($request->get('properties', []));
        return redirect()->route('rooms.show', $room);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room,Request $request)
    {
     
        $room->load('tags', 'properties', 'hotel');
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
