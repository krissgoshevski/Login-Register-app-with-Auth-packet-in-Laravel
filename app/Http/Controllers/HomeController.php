<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        // where role_id != from admin , get all users with their roles 
        $users = User::where('role_id', '!=', 1)->with('role')->get();
        return view('admin', compact('users'));
    }

    public function editor()
    {
        $users = User::where('role_id', 2) // where role_id = 2
        ->with('role')
        ->get();

        //  ->where('status', 'Active')

        $auth_id = Auth::id(); // momentalno id na logiraniot user po primary key 
       // dd($auth_id);
    
        return view('editor', compact('users', 'auth_id'));
    }

    public function regular()
    {
        $users = User::where('role_id', 3)
        ->with('role')
        ->get();
    
        return view('regular', compact('users'));
    }

    public function deactivate($id)
    {
        // za da moze da gi menuva active i inactive samo adminot 
        // ako role_id na logiraniot user mu e 1 odnosno admin, togas mu e se dozvoleno ILI
        // ako userot logiran id-to negovo e ednakvo so $idto sto go primame kako parametar togas
        // vo ovoj slucaj primer za editor togas dozvoli mu da go izvrsi toa, odnosno ako e roki logiran so primary id vo users table 10, toj samiot moze da se napravi active i inactive ili da se izbrise 

        if(Auth::user()->role_id == 1 || Auth::id() == $id)
        {
            $user = User::find($id);
            $user->status = 'Inactive';
            $user->save();
        }
        // ako e admin redirect na ruta admin, ako ne na ruta editor 
            return redirect()->route(Auth::user()->role_id == 1 ? 'admin' : 'editor');
    }

    public function activate($id)
    {
        if(Auth::user()->role_id == 1 || Auth::id() == $id)
        {
            $user = User::find($id);
            $user->status = 'Active';
            $user->save();
        }

            return redirect()->route(Auth::user()->role_id == 1 ? 'admin' : 'editor');
    }

    public function destroy($id)
    {
        if(Auth::user()->role_id == 1 || Auth::id() == $id)
        {
            User::destroy($id);
        }

        return redirect()->route(Auth::user()->role_id == 1 ? 'admin' : 'editor');
    }

}
