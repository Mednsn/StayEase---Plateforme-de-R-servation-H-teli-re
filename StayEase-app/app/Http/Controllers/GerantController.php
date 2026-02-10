<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GerantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user = Auth::user();

       if(!Auth::check() ){
         return view('authentification.connection');
       }
       if( $user->role->name !="gerant"){
         return view('authentification.connection');
       }

        $hotels = Hotel::where("user_id",Auth::id())->get();
        return view("gerant.dashbord",compact('hotels'));
    }


    public function chombre(){
        $chambres = DB::table('rooms')
        ->join('hotels', 'rooms.hotel_id', '=', 'hotels.id') 
        ->where('hotels.user_id', Auth::id())             
        ->select('rooms.*', 'hotels.name as hotel_name')    
        ->get(); 

        return View('gerant.chombre',compact("chambres"));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
