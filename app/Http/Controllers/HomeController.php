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

        $bem = Suara::select('suara_calidbem', DB::raw('count(*) as total'))
        ->groupBy('suara_calidbem')
        ->pluck('total','suara_calidbem')->all();

        function array_push_assoc($array, $key, $value){
            $array[$key] = $value;
            return $array;
         }

        $arr = array();
        foreach($bem as $b){
            array_push($arr, $b);
        } 
        $tanggalpemilihan = Settings::where('idsetting',3)->first();
        $hari1 = Carbon::createFromFormat('Y-m-d', $tanggalpemilihan->setting_value)->format('Y-m-d');
        $hari2 = Carbon::parse($hari1)->add(1, 'day')->format('Y-m-d');
        $hari3 = Carbon::parse($hari2)->add(1, 'day')->format('Y-m-d');

        $hari = array($hari1,$hari2,$hari3);

      $pasangancalon = CalonBem::get();
      $arrayhasil = array();
      foreach($pasangancalon as $p){
        $array = array();
        $harike1 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$tanggalpemilihan->setting_value)->get()); 
        $harike2 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",Carbon::parse($tanggalpemilihan->setting_value)->add(1, 'day')->format('Y-m-d'))->get()); 
        $harike3 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",Carbon::parse($hari2)->add(1, 'day')->format('Y-m-d'))->get());
        $totalcalon = CalonBem::where('idcalonbem',$p->idcalonbem)->withCount('suara')->first(); 
        $array["hari1"] = $harike1;
        $array["hari2"] = $harike2;
        $array["hari3"] = $harike3;
        $array["totalcalon"] = $totalcalon;
        $arrayhasil[$p->idcalonbem] = $array;
      }

      $totalpemilih = count(Pemilih::get());
      $arraytidaksah = array();
      $golputharike1 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$tanggalpemilihan->setting_value)->get()); 
      $golputharike2 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",Carbon::parse($tanggalpemilihan->setting_value)->add(1, 'day')->format('Y-m-d'))->get()); 
      $golputharike3 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",Carbon::parse($hari2)->add(1, 'day')->format('Y-m-d'))->get());
      $golput = count(Suara::where("suara_calidbem",Null)->get());
      $arraytidaksah["hari1"] = $golputharike1;
      $arraytidaksah["hari2"] = $golputharike2;
      $arraytidaksah["hari3"] = $golputharike3;
      $arraytidaksah["totalgolput"] = $golput;
        $calon_bpm = CalonBPM::join('angkatan','calonbpm.calon_angkatancalon','=','angkatan.idangkatan')
        ->select('calonbpm.idcalonbpm','calonbpm.calon_namacalon','calonbpm.calon_pasfoto','angkatan.idangkatan','angkatan.angkatan_tahun')
        ->orderBy('angkatan.idangkatan','ASC')->get();

        for($i=0;$i<count($calon_bpm);$i++){
            $suaracalon = Suara::where('suara_calidbpm', $calon_bpm[$i]["idcalonbpm"])->count();
            $calon_bpm[$i]["suara"] =  $suaracalon;
        } 
        
        if (Carbon::parse($hari1)->format('Y-m-d') == today()->format('Y-m-d') || Carbon::parse($hari1)->addDays(1) == today()->format('Y-m-d')  || Carbon::parse($hari1)->addDays(2) == today()->format('Y-m-d') ) {
            return view('indexpemilihan')->with(compact('totalpemilih','arraytidaksah','arrayhasil','arr','calon_bpm','hari1','hari2','hari3','pasangancalon'));
        } else {
            return view('index')->with(compact('calonbpm','calonbem'));
        }
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
