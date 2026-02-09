<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::where('status', 'pending')->with('user')->get();
        return view('admin.admin', compact('hotels'));

    }
    public function users()
    {
        $users = User::with('role')->get(); 
        return view('admin.users', compact('users'));
    }
    public function updateUserStatus(Request $request, User $user)
{
    $request->validate([
        'status' => 'required|in:active,desactive',
        
    ]);

    $user->update([
        'status' => $request->status,
       
    ]);

    return redirect()->back()->with('success', 'User updated successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(){

    

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request){

    }



    public function approve(Hotel $hotel)
    {
        $hotel->update(['status' => 'approved']);
        return redirect()->route('admin.index');

    }

    public function reject(Hotel $hotel)
    {

        $hotel->update(['status' => 'rejected']);
        return redirect()->route('admin.index');


   }

   
}
