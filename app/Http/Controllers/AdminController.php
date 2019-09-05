<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $fonction = Auth::user()->fonction;
        if($fonction == 'tech') return view('/tech/dashboard');
        if($fonction == 'gest') return view('/gest/dashboard');
        
        $users['users'] = DB::table('users')->where('fonction', '=', 'tech')->orWhere('fonction', '=', 'gest')->get();
        return view('admin.dashboard',$users);
        
    }
}
