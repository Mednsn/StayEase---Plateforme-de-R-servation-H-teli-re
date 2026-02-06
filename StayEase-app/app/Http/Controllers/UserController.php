<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;
use function Laravel\Prompts\info;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('/authentification/connection');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $roles = Role::all();
        return view('/authentification/regester', compact('roles'));

    }
    public function logout()
    {



    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);



        if (Auth::attempt($credentials)) {
            $user = User::where("email", $request->email)->get();
               $role = Role::find($user->value(key: 'role_id'))->value('name');
              
            if ($user->value('status') === 'desactive') {
                
                auth::logout();
                return redirect('/');

            } else {
                if($role==='admine'){
                     dd($role);
                     }

                $request->session()->regenerate();
                return redirect('/');

            }

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = Role::find($request['role_id']);
        if ($id['name'] == 'gerant') {
            $request['status'] = 'desactive';
        } else {
            $request['status'] = 'active';
        }
        $validated = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:8',
            'role_id' => 'required',
            'status' => 'required',
        ]);
        User::create($validated);
        return view('/welcome');
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
        auth::logout();
        return redirect('/');
    }
}
