<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suara;
use App\Models\CalonBem;
use App\Models\CalonBPM;
use App\Models\Pemilih;
use Carbon\Carbon;
use App\Models\Angkatan; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\QueryException as QE; 
use Cookie;
use DB;
use Illuminate\Http\Response;
use App\Models\Settings;
class SuaraController extends Controller
{
    public function hasilpemilihan(){
        function array_push_assoc($array, $key, $value){
            $array[$key] = $value;
            return $array;
         }

        $angkatan = Angkatan::orderBy('idangkatan','ASC')->get();
        $petaangkatan = array();
        foreach($angkatan as $an){
            $arr = array();
            $arr['angkatan'] = $an->angkatan_tahun;
            $jumlahterdaftar = count(Pemilih::where('pemilih_angkatan', $an->idangkatan)->get());
            $jumlahpemilih = count(Suara::join('pemilih','suara.suara_idpemilih','=','pemilih.idpemilih')
            ->join('angkatan','pemilih.pemilih_angkatan','=','angkatan.idangkatan')
            ->select('pemilih.*','angkatan.*')
            ->where('pemilih.pemilih_angkatan', $an->idangkatan)->get());
            $arr['jumlah_pendaftar'] = $jumlahterdaftar;
            $arr['jumlah_pemilih'] = $jumlahpemilih; 
            $petaangkatan[$an->angkatan_tahun] = $arr;
        
        }



        $bem = Suara::select('suara_calidbem', DB::raw('count(*) as total'))
        
        ->groupBy('suara_calidbem')
        ->pluck('total','suara_calidbem')->all();

        
        $arrx = array();
        foreach($bem as $b){
            array_push($arrx, (int) $b);
        } 

        $tanggalpemilihan = Settings::where('idsetting',3)->first();
        $hari1 = Carbon::createFromFormat('Y-m-d', $tanggalpemilihan->setting_value)->format('Y-m-d');
        $hari2 = Carbon::parse($hari1)->add(1, 'day')->format('Y-m-d');
        $hari3 = Carbon::parse($hari2)->add(1, 'day')->format('Y-m-d');
        $hari4 = Carbon::parse($hari3)->add(1, 'day')->format('Y-m-d');
        $hari5 = Carbon::parse($hari4)->add(1, 'day')->format('Y-m-d');

        $hari = array($hari1,$hari2,$hari3,$hari4,$hari5);

      $pasangancalon = CalonBem::get();
      $arrayhasil = array();
      foreach($pasangancalon as $p){
        $array = array();
        $harike1 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$hari1)->get()); 
        $harike2 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$hari2)->get()); 
        $harike3 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$hari3)->get()); 
        $harike4 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$hari4)->get()); 
        $harike5 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$hari5)->get());
        $totalcalon = $harike1+$harike2+$harike3+$harike4+$harike5; 
        $array["hari1"] = $harike1;
        $array["hari2"] = $harike2;
        $array["hari3"] = $harike3;
        $array["hari4"] = $harike4;
        $array["hari5"] = $harike5;
        $array["totalcalon"] = $totalcalon;
        $arrayhasil[$p->idcalonbem] = $array;
      }
      
      $pemetaanpilihan = array();
      foreach($pasangancalon as $pc){
        $array = array();
        $infocalon = CalonBem::where('idcalonbem',$pc->idcalonbem)->select('calon_pasfoto','calon_nourut','calon_namapasangan','calon_slogan','calon_namaketua','calon_namawakil')->first();
        $array['infocalon'] = $infocalon;
        $pemilihberdasarkanangkatan = array();
         foreach($angkatan as $an){ 
            $arr = array();
            $arr['angkatan'] = $an->angkatan_tahun; 
            $jumlahpemilih = count(Suara::join('pemilih','suara.suara_idpemilih','=','pemilih.idpemilih')
            ->join('angkatan','pemilih.pemilih_angkatan','=','angkatan.idangkatan')
            ->select('pemilih.*','angkatan.*','suara.*')
            ->where('pemilih.pemilih_angkatan', $an->idangkatan)
            ->where('suara.suara_calidbem',$pc->idcalonbem)
            ->get());
            $arr['jumlah_pemilih'] = $jumlahpemilih; 
            $pemilihberdasarkanangkatan[$an->angkatan_tahun] = $arr; 
         }
         $array['pemilih'] = $pemilihberdasarkanangkatan;
         $pemetaanpilihan[$pc->idcalonbem] = $array;
    }

      $totalpemilih = count(Pemilih::get());
      $arraytidaksah = array();
      $golputharike1 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$hari1)->get()); 
      $golputharike2 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$hari2)->get()); 
      $golputharike3 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$hari3)->get());
      $golputharike4 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$hari4)->get());
      $golputharike5 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$hari5)->get());
      $golput = $golputharike1+$golputharike2+$golputharike3+$golputharike4+$golputharike5;
      $arraytidaksah["hari1"] = $golputharike1;
      $arraytidaksah["hari2"] = $golputharike2;
      $arraytidaksah["hari3"] = $golputharike3;
      $arraytidaksah["hari4"] = $golputharike4;
      $arraytidaksah["hari5"] = $golputharike5;
      $arraytidaksah["totalgolput"] = $golput;
        $calon_bpm = CalonBPM::join('angkatan','calonbpm.calon_angkatancalon','=','angkatan.idangkatan')
        ->select('calonbpm.idcalonbpm','calonbpm.calon_namacalon','calonbpm.calon_pasfoto','angkatan.idangkatan','angkatan.angkatan_tahun')
        ->orderBy('angkatan.idangkatan','ASC')->get();

        for($i=0;$i<count($calon_bpm);$i++){
            $suaracalon = Suara::where('suara_calidbpm', $calon_bpm[$i]["idcalonbpm"])->count();
            $calon_bpm[$i]["suara"] =  $suaracalon;
        } 

        $calonbems = array();
        foreach($pasangancalon as $b){
            array_push($calonbems, $b->calon_namapasangan);  
        }  

        array_push($calonbems, "Tidak Sah");
    
    return view('hasilpemilihan')->with(compact('calonbems','arrx','pemetaanpilihan','petaangkatan','totalpemilih','arraytidaksah','arrayhasil','arr','calon_bpm','hari1','hari2','hari3','pasangancalon'));
   //return $arrayhasil;   
 
    }

    public function index(){
       function array_push_assoc($array, $key, $value){
            $array[$key] = $value;
            return $array;
         }

        $angkatan = Angkatan::orderBy('idangkatan','ASC')->get();
        $petaangkatan = array();
        foreach($angkatan as $an){
            $arr = array();
            $arr['angkatan'] = $an->angkatan_tahun;
            $jumlahterdaftar = count(Pemilih::where('pemilih_angkatan', $an->idangkatan)->get());
            $jumlahpemilih = count(Suara::join('pemilih','suara.suara_idpemilih','=','pemilih.idpemilih')
            ->join('angkatan','pemilih.pemilih_angkatan','=','angkatan.idangkatan')
            ->select('pemilih.*','angkatan.*')
            ->where('pemilih.pemilih_angkatan', $an->idangkatan)->get());
            $arr['jumlah_pendaftar'] = $jumlahterdaftar;
            $arr['jumlah_pemilih'] = $jumlahpemilih; 
            $petaangkatan[$an->angkatan_tahun] = $arr;
        
        }



        $bem = Suara::select('suara_calidbem', DB::raw('count(*) as total'))
        
        ->groupBy('suara_calidbem')
        ->pluck('total','suara_calidbem')->all();

        
        $arrx = array();
        foreach($bem as $b){
            array_push($arrx, (int) $b);
        } 
        
        $tanggalpemilihan = Settings::where('idsetting',3)->first();
        $hari1 = Carbon::createFromFormat('Y-m-d', $tanggalpemilihan->setting_value)->format('Y-m-d');
        $hari2 = Carbon::parse($hari1)->add(1, 'day')->format('Y-m-d');
        $hari3 = Carbon::parse($hari2)->add(1, 'day')->format('Y-m-d');
        $hari4 = Carbon::parse($hari3)->add(1, 'day')->format('Y-m-d');
        $hari5 = Carbon::parse($hari4)->add(1, 'day')->format('Y-m-d');

        $hari = array($hari1,$hari2,$hari3,$hari4,$hari5);

      $pasangancalon = CalonBem::get();
      $arrayhasil = array();
      foreach($pasangancalon as $p){
        $array = array();
        $harike1 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$hari1)->get()); 
        $harike2 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$hari2)->get()); 
        $harike3 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$hari3)->get()); 
        $harike4 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$hari4)->get()); 
        $harike5 = count(Suara::where("suara_calidbem",$p->idcalonbem)->where("suara_tanggal",$hari5)->get());
        $totalcalon = $harike1+$harike2+$harike3+$harike4+$harike5; 
        $array["hari1"] = $harike1;
        $array["hari2"] = $harike2;
        $array["hari3"] = $harike3;
        $array["hari4"] = $harike4;
        $array["hari5"] = $harike5;
        $array["totalcalon"] = $totalcalon;
        $arrayhasil[$p->idcalonbem] = $array;
      }
      
      $pemetaanpilihan = array();
      foreach($pasangancalon as $pc){
        $array = array();
        $infocalon = CalonBem::where('idcalonbem',$pc->idcalonbem)->select('calon_pasfoto','calon_nourut','calon_namapasangan','calon_slogan','calon_namaketua','calon_namawakil')->first();
        $array['infocalon'] = $infocalon;
        $pemilihberdasarkanangkatan = array();
         foreach($angkatan as $an){ 
            $arr = array();
            $arr['angkatan'] = $an->angkatan_tahun; 
            $jumlahpemilih = count(Suara::join('pemilih','suara.suara_idpemilih','=','pemilih.idpemilih')
            ->join('angkatan','pemilih.pemilih_angkatan','=','angkatan.idangkatan')
            ->select('pemilih.*','angkatan.*','suara.*')
            ->where('pemilih.pemilih_angkatan', $an->idangkatan)
            ->where('suara.suara_calidbem',$pc->idcalonbem)
            ->get());
            $arr['jumlah_pemilih'] = $jumlahpemilih; 
            $pemilihberdasarkanangkatan[$an->angkatan_tahun] = $arr; 
         }
         $array['pemilih'] = $pemilihberdasarkanangkatan;
         $pemetaanpilihan[$pc->idcalonbem] = $array;
    }

      $totalpemilih = count(Pemilih::get());
      $arraytidaksah = array();
      $golputharike1 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$hari1)->get()); 
      $golputharike2 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$hari2)->get()); 
      $golputharike3 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$hari3)->get());
      $golputharike4 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$hari4)->get());
      $golputharike5 = count(Suara::where("suara_calidbem",Null)->where("suara_tanggal",$hari5)->get());
      $golput = $golputharike1+$golputharike2+$golputharike3+$golputharike4+$golputharike5;
      $arraytidaksah["hari1"] = $golputharike1;
      $arraytidaksah["hari2"] = $golputharike2;
      $arraytidaksah["hari3"] = $golputharike3;
      $arraytidaksah["hari4"] = $golputharike4;
      $arraytidaksah["hari5"] = $golputharike5;
      $arraytidaksah["totalgolput"] = $golput;
        $calon_bpm = CalonBPM::join('angkatan','calonbpm.calon_angkatancalon','=','angkatan.idangkatan')
        ->select('calonbpm.idcalonbpm','calonbpm.calon_namacalon','calonbpm.calon_pasfoto','angkatan.idangkatan','angkatan.angkatan_tahun')
        ->orderBy('angkatan.idangkatan','ASC')->get();

        for($i=0;$i<count($calon_bpm);$i++){
            $suaracalon = Suara::where('suara_calidbpm', $calon_bpm[$i]["idcalonbpm"])->count();
            $calon_bpm[$i]["suara"] =  $suaracalon;
        } 

        $calonbems = array();
        foreach($pasangancalon as $b){
            array_push($calonbems, $b->calon_namapasangan);  
        }  

        array_push($calonbems, "Tidak Sah");

        return view('admin.suara.index')->with(compact('calonbems','arrx','pemetaanpilihan','petaangkatan','totalpemilih','arraytidaksah','arrayhasil','arr','calon_bpm','hari1','hari2','hari3','pasangancalon'));
       //return $suarabpm;
       //return $calon_bpm;
    }


    public function pilihauthenticate(Request $request){
        
        $cookies = $request->cookie('secret');
        $tanggalpemilihan = Settings::where('idsetting',3)->first();
        $jammulaipemilihan = Settings::where('idsetting',4)->first();
        $jamakhirpemilihan = Settings::where('idsetting',5)->first();
        if($cookies){
          return redirect('pilih/calon');
        }else {
        return view('insertcode')->with(compact('tanggalpemilihan','jammulaipemilihan','jamakhirpemilihan'));
        }
    }

    public function authenticateuser(Request $request){ 
        $pemilih = Pemilih::where('pemilih_secretcode', $request->secretcode)->first();
        $suara = Suara::where('suara_secretcode', $request->secretcode)->get();
        $cookies = $request->cookie('sudahisi');
        if($pemilih && is_null($pemilih->pemilih_pilihan) && count($suara) == 0 && empty($cookies)){

            return redirect('pilih/calon')->withCookie(cookie('secret', $request->secretcode, 180));
        }
        alert('Error','Secret Key Salah atau Sudah Terpakai', 'error');
        return redirect()->back();
    }

    public function pilihauthenticated(Request $request){
        
        $cookies = $request->cookie('secret');

        if($cookies){
            $bem = CalonBem::join('angkatan','calonbem.calon_angkatanketua','=','angkatan.idangkatan')
            ->select('calonbem.*','angkatan.*')->orderBy('calonbem.calon_nourut','asc')->get(); 
            $angkatan = Pemilih::where('pemilih_secretcode', $cookies)->first();
           
            $bpm = CalonBpm::join('angkatan','calonbpm.calon_angkatancalon','=','angkatan.idangkatan')
            ->select('calonbpm.*','angkatan.*')->where('calonbpm.calon_angkatancalon',$angkatan->pemilih_angkatan)->get();
            $idpem = $angkatan->idpemilih;
            return view('pilih')->with(compact('bpm','bem','idpem'));
        }else {
            return redirect('pilih');
        }
        
    }

    public function storepilihan(Request $request){
        $store = collect(); 
        $pemilih = Pemilih::where('idpemilih', $request->suara_idpemilih)->first();
        $cookies = $request->cookie('secret');
        $hariini = Carbon::now('Asia/Jakarta')->locale('id_ID')->format('Y-m-d');
        $jamini = Carbon::now('Asia/Jakarta')->locale('id_ID')->format('H:i');
        $store->put('suara_calidbem',$request->suara_calidbem);
        $store->put('suara_calidbpm',$request->suara_calidbpm);
        $store->put('suara_idpemilih',$pemilih->idpemilih);
        $store->put('suara_jam',$jamini);        
        $store->put('suara_tanggal',$hariini);        
        $store->put('suara_secretcode',$pemilih->pemilih_secretcode);
        $store->put('suara_cookies',$cookies);

        
        $suara = Suara::where('suara_secretcode', $request->secretcode)->get();
        if(is_null($pemilih->pemilih_pilihan) && count($suara) == 0){
        try {
            $idsuara = Suara::insertGetId($store->all());
            $cookie = Cookie::forget('secret');
            $pemilih->pemilih_pilihan = $idsuara; 
            $pemilih->update();
            } catch (QE $e) { 
                alert('Error','Database Error', 'error');
                return $e;
            }
        }
        
        $cookie = Cookie::forget('secret');
            return redirect('thankyou')->withCookie(cookie('sudahisi', 'sudah isi', 160))->withCookie($cookie);
      
    }

    public function thankyou(Request $request){
        $cookies = $request->cookie('sudahisi');
        if($cookies){
return view('thankyou');
        }else {
return redirect('pilih');
        }
    }
}
