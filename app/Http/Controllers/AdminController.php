<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //index page
    public function dashboard(){
        $fonction = Auth::user()->fonction;//select fonctions of users

        //security of the page: if someone try to access to this page and he is not an administrator he will be redirect to his index page
        if($fonction == 'tech') return redirect('/tech/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');
        
        //list of technician and gestionnaire
        $users['users'] = DB::table('users')->where('fonction', '=', 'tech')->orWhere('fonction', '=', 'gest')->get();
        return view('admin.dashboard',$users);
        
    }
    public function delete($email){
        //security of the page: if someone try to access to this page and he is not an administrator he will be redirect to his index page
        $fonction = Auth::user()->fonction;
        if($fonction == 'tech') return redirect('/tech/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');
        //query to delete a gestionnaire/technician
        $data['user'] = DB::table('users')->where('email','=',$email)->delete();
        return redirect('/admin/dashboard');
    }
    public function insert(){
         //security of the page: if someone try to access to this page and he is not an administrator he will be redirect to his index page
         $fonction = Auth::user()->fonction;
        if($fonction == 'tech') return redirect('/tech/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');
        //redirect to the page
        return view ('/admin/add');
    }
    public function add(Request $request){
        //insert technicain and gestionnaire
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
    public function operationSelector($mois){
        //security of the page: if someone try to access to this page and he is not an administrator he will be redirect to his index page
        $fonction = Auth::user()->fonction;
        if($fonction == 'tech') return redirect('/tech/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');
        //count the number of operations
        $count = DB::table('operations')->whereMonth('dateDebut', $mois)->get()->count();
        //select the operations that still in progress
        $op_en_cours = DB::table('operations')->where('status','=','En reparation')->get();
        //select the operations that are incoming
        $op_avenir = DB::table('operations')->whereMonth('dateDebut', '>' ,date('m'))->get();
        //select all the vehicules
        $vehicules = DB::table('vehicules')->get();

        $data_to_pass_to_view = [];
        $data_to_pass_to_view["count"] = $count;
        $data_to_pass_to_view["vehicules"] = $vehicules;
        $data_to_pass_to_view["avenir"] = $op_avenir;
        $data_to_pass_to_view["encours"] = $op_en_cours;

        return view('/admin/global',$data_to_pass_to_view);
    }
    
}