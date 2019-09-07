<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Auth;
use App\vehicule;
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
         $dateDebut = $request->input('dateDebut');
         $dateFin = $request->input('dateFin');
         $sujet = $request->input('sujet');
         $Description = $request->input('Description');
         $Pieces = implode(",",$request->pièces);
         $technicien = Auth::user()->nom;
         $Notes = $technicien .' : '.$request->input('Notes');
         $vehicule = $request->route('id');

         $data = array('dateDebut'=>$dateDebut,
         'dateFin' => $dateFin,
         'sujet' => $sujet,
         'Description'=> $Description,
         'Pieces' =>$Pieces,
         'Notes'=>$Notes,
         'vehicule_id'=>$vehicule);
         DB::table('operations')->insert($data);
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
}
