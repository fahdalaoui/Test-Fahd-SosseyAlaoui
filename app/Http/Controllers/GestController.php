<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Auth;
use App\vehicule;

use Illuminate\Http\Request;

class GestController extends Controller
{
    public function dashboard(){
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'tech') return redirect('/tech/dashboard');

        $vehicules['vehicules'] = DB::table('vehicules')->get();

        return view('gest.dashboard',$vehicules);
    }

    public function insert(){
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'tech') return redirect('/tech/dashboard');
        return view ('/gest/add');
    }
    public function add(Request $request){
       $marque = $request->input('marque');
       $immatriculation = $request->input('immatriculation');
       $chevaux = $request->input('chevaux');
       $type = $request->input('type');
       $modele = $request->input('modele');
       
       $data = array('marque'=>$marque,
       'immatriculation' => $immatriculation,
       'chevaux' => $chevaux,
       'type'=> $type,
        'modele' =>$modele);
        DB::table('vehicules')->insert($data);
        return redirect('/gest/dashboard');
    }

    public function delete($immatriculation){
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'tech') return redirect('/tech/dashboard');
        
        $data['vehicules'] = DB::table('vehicules')->where('immatriculation','=',$immatriculation)->delete();
        return redirect('/gest/dashboard');
    }
}
