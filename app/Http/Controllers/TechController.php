<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class TechController extends Controller
{
    public function dashboard(){
        $fonction = Auth::user()->fonction;
        if($fonction == 'admin') return redirect('/admin/dashboard');
        if($fonction == 'gest') return redirect('/gest/dashboard');
        return view('tech.dashboard');
    }
}
