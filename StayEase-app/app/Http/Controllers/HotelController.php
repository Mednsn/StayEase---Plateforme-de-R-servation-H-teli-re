<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all(); 
        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');        
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'address' => 'required|string|max:255',
        ]);

    
        Hotel::create($validated);

        return redirect()->route('hotels.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit',compact('hotel'));        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'address' => 'required|string|max:255',
        ]);

    
        $hotel->update($validated);
        return redirect()->route('hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
         $hotel->delete();
        return redirect()->route('hotels.index');
    }
}
