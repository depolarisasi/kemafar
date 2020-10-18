<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suara;
use App\Models\CalonBem;
use App\Models\CalonBpm;
use App\Models\Pemilih;
use Carbon\Carbon;
use App\Models\Angkatan; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\QueryException as QE; 
use Cookie;
use Illuminate\Http\Response;

class SuaraController extends Controller
{
    public function pilihauthenticate(Request $request){
        
        $cookies = $request->cookie('secret');
        if($cookies){
          return redirect('pilih/calon');
        }else {
            
        return view('insertcode');
        }
    }

    public function authenticateuser(Request $request){ 
        $pemilih = Pemilih::where('pemilih_secretcode', $request->secretcode)->first();
        $suara = Suara::where('suara_secretcode', $request->secretcode)->get();
        $cookies = $request->cookie('sudahisi');
        if($pemilih && is_null($pemilih->pemilih_pilihan) && count($suara) == 0 && empty($cookies)){

            return redirect('pilih/calon')->withCookie(cookie('secret', $request->secretcode, 360));
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
            return redirect('thankyou')->withCookie(cookie('sudahisi', 'sudah isi', 720))->withCookie($cookie);
      
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
