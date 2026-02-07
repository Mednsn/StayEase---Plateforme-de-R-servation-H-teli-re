<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Role;
use App\Models\User;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $hotels = Hotel::where('status','pending')->with('user')->get();
         return view('admin.admin', compact('hotels'));

    }

    public function getUsers(){
        $users = User::with('role')->get();
        
        return view('admin.usersdashbord',compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(User $admin){

       $roles = Role::all();
      return view('admin.edit',compact('admin','roles'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request,User $admin){

      $validated = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'role_id'=>'required|integer',
        ]);
        $admin->update($validated);

      return redirect()->route('admin.getUsers');

    }



    public function approve(Hotel $hotel)
    {
        $hotel->update(['status' => 'approved']);
        return redirect()->route('admin.index');

    }

   public function reject(Hotel $hotel)
   {

        $hotel->update(['status'=>'rejected']);
        return redirect()->route('admin.index');


   }

   public function destroy(User $admin){
      $admin->delete();
     return redirect()->route('admin.getUsers');
   }
}
