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
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');

        $vehicules['vehicules'] = DB::table('vehicules')->get();
        return view('tech.dashboard',$vehicules);
    }

    public function insert($id){
        $vech_id['vech_id'] = $id;
        return view('/tech/operation',$vech_id);
    }
    
    public function add(Request $request){
        //   $data = array('dateDebut'=>$dateDebut,
        //   'dateFin' => "",
        //   'sujet' => $sujet,
        //   'Description'=> $Description,
        //   'Pieces' =>$Pieces,
        //   'Notes'=>$Notes,
        //   'vehicule_id'=>$vehicule,
        //   'status'=>'En reparation');
        //   DB::table('operations')->insert($data);
        
          $dateDebut = $request->input('dateDebut');
          $sujet = $request->input('sujet');
          $Description = $request->input('Description');
          $Pieces = implode(",",$request->pièces);
          $technicien = Auth::user()->nom;
          $Notes = $technicien .' : '.$request->input('Notes');
          $vehicule = $request->route('id');
          $image = request('image')->store('uploads','public');
          
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
              DB::table('vehicules')
              ->where('id', $request->route('id'))
              ->update(['etat' => 'En reparation']);
         }

          return redirect('/tech/dashboard');
    }

    public function allOperations(){
            $fonction = Auth::user()->fonction;
            if($fonction == 'admin') return redirect('/admin/dashboard');
            if($fonction == 'gest') return redirect('/gest/dashboard');
    
            $operations['operations'] = DB::table('operations')->get();
            return view('tech.alloperations',$operations);
    }

    public function update($id){
        $operation_id['operation_id'] = $id;
        return view('/tech/update',$operation_id);
    }

    public function modifier(Request $request){
        $technicien = Auth::user()->nom;
        $notes= DB::table('operations')->where('id','=',$request->route('id'))->get();
        foreach ($notes as $n)
        {
            $note = $n->notes;
            $new_note = $technicien .' : '.$request->input('Notes');
            $final_note = $note.' , '.$new_note;
            DB::table('operations')
            ->where('id', $request->route('id'))
            ->update(['notes' => $final_note]);
        }
        return redirect('/tech/alloperations');
    }
    public function terminer($id){
        $operation= DB::table('operations')->where('id','=',$id)->get();
        $dateFin = Carbon::now();
        foreach ($operation as $o){
            DB::table('operations')
            ->where('id', $id)
            ->update(['dateFin' => $dateFin->toDateString()]);
            DB::table('operations')
            ->where('id', $id)
            ->update(['status' => 'Terminer']);
            DB::table('vehicules')
            ->where('id', $id)
            ->update(['etat' => 'Reparer']);
        }
        return redirect("/tech/alloperations");
    }
    
    public function info($veh){
        $vehi = $veh;
        $vehicules['vehicules'] = \App\vehicule::find($vehi);
        return view("/vehiculeInfo/info",$vehicules);
    }
}
