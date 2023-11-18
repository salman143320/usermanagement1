<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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
        $this->user = new User();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $userId = Auth::id();
        $users = $this->user::where('id',$userId)->paginate(10);
        $userrole = isset($users[0]->user_role)?$users[0]->user_role:'';
        if($userrole == 'super_admin'){
            $usersArr = $this->user::where('user_role','!=','super_admin')->paginate(10);
            return view('adminhome',['usersArr'=> $usersArr]);
        }else{
            return view('home',['users'=> $users]);
        }
    }
}
