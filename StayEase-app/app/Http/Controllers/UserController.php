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

       auth::logout();
        return redirect('/');


    }
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            if ($user->status === 'desactive') {
                Auth::logout();
                return redirect('/')->withErrors([
                    'email' => 'Your account is deactivated'
                    ]);
                    }
                    
                    if ($user->role->name === 'admin') {
                        return redirect('/admin');
                        }
                        
                        return redirect('/');
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
                    public function edit(User $user){
                        
                        $roles = Role::all();
                        return view('admin.edit',compact('user','roles'));
                        
                        }
                        
                        
    /**
     * Update the specified resource in storage.
    */
    
    public function update(Request $request,User $user){

        $validated = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'role_id'=>'required|integer',
            ]);
            $user->update($validated);

      return redirect()->route('admin.getUsers');

      }
      
      
      /**
       * Remove the specified resource from storage.
      */
      public function destroy(User $user)
      {
           $user->delete();
          return redirect()->route('admin.getUsers');
        }
        }
        