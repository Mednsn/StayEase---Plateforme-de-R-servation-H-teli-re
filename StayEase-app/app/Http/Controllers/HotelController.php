<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         
        $hoteladdress =  Hotel::where('status','approved')->select("address")->get();

        $hote = DB::table('hotels')->where('status', 'approved');

        if ($request->address) {
            $hote->where('address', $request->address);
        }

        $hotels = $hote->paginate(6)->appends($request->query());

        return view('hotels.index', compact('hotels', 'hoteladdress'));
    }


    public function create()
    {

      $user = Auth::user();

    if(!Auth::check()){
         return view('authentification.connection');
       }
    if($user->role->name != "gerant"){
            return view('welcome');
       }
        return view('hotels.create');        
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'address' => 'required|string|max:255'
        ]);
         $validated['user_id'] = Auth::id();
    
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
        if(!Auth::check()){
         return view('authentification.connection');
       }
        return view('hotels.edit',compact('hotel'));        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        if(!Auth::check()){
         return view('authentification.connection');
       }
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
