<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonBem;
use App\Models\CalonBPM;
use Auth;
use App\Models\Suara; 
use App\Models\Pemilih;
use Carbon\Carbon;
use App\Models\Angkatan; 
use App\Models\Settings; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\QueryException as QE; 
use Cookie;
use DB; 
use Illuminate\Http\Response;
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
 
        $calonbem = CalonBem::join('angkatan','calonbem.calon_angkatanketua','=','angkatan.idangkatan')
        ->select('calonbem.*','angkatan.*')->orderBy('calonbem.calon_nourut','asc')->get();
        
        $calonbpm = CalonBPM::join('angkatan','calonbpm.calon_angkatancalon','=','angkatan.idangkatan')
        ->select('calonbpm.*','angkatan.*')->orderBy('calonbpm.calon_angkatancalon','asc')->get();
  
            return view('index')->with(compact('calonbpm','calonbem'));
        
    }

    public function panduan(){
        return view('carapilih');
    }

    public function timeline(){
        return view('timeline');
    }
 
    public function privacy(){
        return view('privacy-algorithm');
    }

    public function logout(){
      Auth::logout();
      // redirect to homepage
      return redirect('/');
    }
}
