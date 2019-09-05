<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $fonction = Auth::user()->fonction;
        if($fonction == 'tech') return redirect('/tech/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');
        
        $users['users'] = DB::table('users')->where('fonction', '=', 'tech')->orWhere('fonction', '=', 'gest')->get();
        return view('admin.dashboard',$users);
        
    }
    public function delete($email){
        
        $data['user'] = DB::table('users')->where('email','=',$email)->delete();
        return redirect('/admin/dashboard');
    }
    public function insert(){
        
        return view ('/admin/add');
    }
    public function add(Request $request){
       $nom = $request->input('nom');
       $fonction = $request->input('fonction');
       $email = $request->input('email');
       $password = $request->input('password');
       
       $data = array('nom'=>$nom,
       'fonction' => $fonction,
       'email' => $email,
       'password'=> Hash::make($password));
        DB::table('users')->insert($data);
        return redirect('/admin/dashboard');
    }
}