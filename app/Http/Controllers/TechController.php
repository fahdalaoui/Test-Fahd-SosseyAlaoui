<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Auth;
use App\operation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TechController extends Controller
{
    public function dashboard(){
        //security of the page: if someone try to access to this page and he is not a techinician he will be redirect to his index page
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');
        //get all the vehicules
        $vehicules['vehicules'] = DB::table('vehicules')->get();
        return view('tech.dashboard',$vehicules);
    }

    public function insert($id){
        //security of the page: if someone try to access to this page and he is not a gestionnaire he will be redirect to his index page
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');
        //get the id of the vehicule to repare
        $vech_id['vech_id'] = $id;
        return view('/tech/operation',$vech_id);
    }
    
    public function add(Request $request){

        $dateDebut = $request->input('dateDebut');
        $sujet = $request->input('sujet');
        $Description = $request->input('Description');
        $Pieces = implode(",",$request->pièces);
        $technicien = Auth::user()->nom;
        $Notes = $technicien .' : '.$request->input('Notes');
        $vehicule = $request->route('id');
        $image = request('image')->store('uploads','public');
        
        //insert the operation
        $data = new \App\Operation();

        $data->dateDebut = $dateDebut;
        $data->dateFin = "";
        $data->sujet = $sujet;
        $data->Description = $Description;
        $data->Pieces = $Pieces;
        $data->Notes = $Notes;
        $data->vehicule_id = $vehicule;
        $data->status = "En reparation";
        $data->image = $image;

        $data->save();

           $etat= DB::table('vehicules')->where('id','=',$request->route('id'))->get();
          foreach($etat as $e){
              //when a vehicule get selected to be repair it's etat should change to reparation
              //and this is excatly what i did here
              DB::table('vehicules')
              ->where('id', $request->route('id'))
              ->update(['etat' => 'En reparation']);
         }

          return redirect('/tech/dashboard');
    }

    public function allOperations(){
            //security of the page: if someone try to access to this page and he is not a gestionnaire he will be redirect to his index page
            $fonction = Auth::user()->fonction;
            if($fonction == 'admin') return redirect('/admin/dashboard');
            if($fonction == 'gest') return redirect('/gest/dashboard');
            //get all operations
            $operations['operations'] = DB::table('operations')->get();
            return view('tech.alloperations',$operations);
    }

    public function update($id){
        //security of the page: if someone try to access to this page and he is not a gestionnaire he will be redirect to his index page
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');

        //get the id of the operation to update it's note
        $operation_id['operation_id'] = $id;
        return view('/tech/update',$operation_id);
    }

    public function modifier(Request $request){
        $technicien = Auth::user()->nom;
        $notes= DB::table('operations')->where('id','=',$request->route('id'))->get();
        //update the note
        foreach ($notes as $n)
        {
            //get the old note
            $note = $n->notes;
            //add the new note
            $new_note = $technicien .' : '.$request->input('Notes');
            //concatenate between the old and new note
            $final_note = $note.' , '.$new_note;
            //update the note
            DB::table('operations')
            ->where('id', $request->route('id'))
            ->update(['notes' => $final_note]);
        }
        return redirect('/tech/alloperations');
    }
    public function terminer($id){
        //security of the page: if someone try to access to this page and he is not a gestionnaire he will be redirect to his index page
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');
        
        //get the operations to validate
        $operation= DB::table('operations')->where('id','=',$id)->get();
        //get today date
        $dateFin = Carbon::now();
        foreach ($operation as $o){
            //update the date where the operations ended
            DB::table('operations')
            ->where('id', $id)
            ->update(['dateFin' => $dateFin->toDateString()]);
            //change the status of the operations to 'Terminer'
            DB::table('operations')
            ->where('id', $id)
            ->update(['status' => 'Terminer']);
            //change the etat of the vehicule to 'Reparer' when it ended
            DB::table('vehicules')
            ->where('id', $id)
            ->update(['etat' => 'Reparer']);
        }
        return redirect("/tech/alloperations");
    }
    
    public function info($veh){
        //security of the page: if someone try to access to this page and he is not a gestionnaire he will be redirect to his index page
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');
        //get the id of the vehicule to show it detail
        $vehi = $veh;
        //find the vehicule
        $vehicules['vehicules'] = \App\vehicule::find($vehi);
        return view("/vehiculeInfo/info",$vehicules);
    }
}
