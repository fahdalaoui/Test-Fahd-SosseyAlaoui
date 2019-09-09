<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Auth;
use App\vehicule;

use Illuminate\Http\Request;

class GestController extends Controller
{
    public function dashboard(){
        //security of the page: if someone try to access to this page and he is not a gestionnaire he will be redirect to his index page
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'tech') return redirect('/tech/dashboard');
        //get all the vehicules
        $vehicules['vehicules'] = DB::table('vehicules')->get();

        return view('gest.dashboard',$vehicules);
    }

    public function insert(){
        //security of the page: if someone try to access to this page and he is not a gestionnaire he will be redirect to his index page
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'tech') return redirect('/tech/dashboard');
        //redirect to the insert page
        return view ('/gest/add');
    }
    public function add(Request $request){
       $marque = $request->input('marque');
       $immatriculation = $request->input('immatriculation');
       $chevaux = $request->input('chevaux');
       $type = $request->input('type');
       $modele = $request->input('modele');
       $dateAchat = $request->input('dateAchat');
       $etat = $request->input('etat');
       //insert vehicules to the database
       $data = array('marque'=>$marque,
       'immatriculation' => $immatriculation,
       'chevaux' => $chevaux,
       'type'=> $type,
        'modele' =>$modele,
        'dateAchat'=>$dateAchat,
        'etat'=>'Bien');
        DB::table('vehicules')->insert($data);
        return redirect('/gest/dashboard');
    }

    public function delete($immatriculation){
        //security of the page: if someone try to access to this page and he is not a gestionnaire he will be redirect to his index page
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'tech') return redirect('/tech/dashboard');
        //query to delete the vehicule by immatriculation
        $data['vehicules'] = DB::table('vehicules')->where('immatriculation','=',$immatriculation)->delete();
        return redirect('/gest/dashboard');
    }
}
