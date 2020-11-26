<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonBem;
use App\Models\CalonBPM;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */ 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $bem = CalonBem::join('angkatan','calonbem.calon_angkatanketua','=','angkatan.idangkatan')
        ->select('calonbem.*','angkatan.*')->orderBy('calonbem.calon_nourut','asc')->get();
        
        $bpm = CalonBPM::join('angkatan','calonbpm.calon_angkatancalon','=','angkatan.idangkatan')
        ->select('calonbpm.*','angkatan.*')->orderBy('calonbpm.calon_angkatancalon','asc')->get();
        return view('index')->with(compact('bpm','bem'));
    }
}
