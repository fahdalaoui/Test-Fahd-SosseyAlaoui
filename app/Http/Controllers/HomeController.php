<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    
    public function operationSelector($mois){
        $count = DB::table('operations')->whereMonth('dateDebut', $mois)->get()->count();
        $data_to_pass_to_view = [];
        $data_to_pass_to_view["count"] = $count;
        return view('/test',$data_to_pass_to_view);
    }
}
