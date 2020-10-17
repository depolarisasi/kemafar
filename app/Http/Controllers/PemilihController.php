<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilih;
use App\Models\Angkatan;
use App\Imports\PemilihImport; 
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PemilihController extends Controller
{
    public function index(){
        $pemilih = Pemilih::join('angkatan', 'pemilih.pemilih_angkatan','=','angkatan.idangkatan')
        ->select('pemilih.*','angkatan.angkatan_tahun')->get();
        return view('admin.pemilih.index')->with(compact('pemilih'));
    }

    public function new(){ 
        $angkatan = Angkatan::get();
        return view('admin.pemilih.new')->with(compact('angkatan'));
    }

    public function store(Request $request){ 
        $store = collect($request->all());
        $secret = mt_rand(1,1000).mt_rand(1,100).mt_rand(1,5).mt_rand(1,9).mt_rand(1,7);
        $store->put('pemilih_secretcode',$secret);
        $checkpemilih = Pemilih::where('pemilih_npm',$request->pemilih_npm)
        ->orWhere('pemilih_email',$request->pemilih_email)->first();
        if($checkpemilih){
            alert('Error','Pemilih sudah ada !', 'error');
            return redirect()->back();
        }else {
        try {
        Pemilih::create($store->all());
        } catch (QE $e) { 
            alert('Error','Database Error', 'error');
            return redirect()->back();
        }
         }
        
        alert('Success','Pemilih Berhasil Ditambahkan', 'success');

        return redirect('pengelola/pemilih');
    }

public function importpage(){
    return view('admin.pemilih.import');
}

public function importpemilih(Request $request)
    {
        if ($request->file('xlspemilih') != '' || $request->file('xlspemilih') !== null) {
            $file = $request->file('xlspemilih');
            $fileArray = ['xlspemilih' => $file];
            $rules = ['xlspemilih' => 'mimes:xls,xlsx,csv,tsv,txt'];
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                // Redirect or return json to frontend with a helpful message to inform the user
                // that the provided file was not an adequate type 

                alert('Error','File yang anda unggah bukan sebuah file XLSX, XLS atau CSV', 'error');
                return redirect()->back();
            } else {
                Excel::import(new PemilihImport(), $request->file('xlspemilih'));
                
        alert('Success','Pemilih Berhasil Ditambahkan', 'success');
            }
        }

        return redirect('pengelola/pemilih');
    }

    public function edit($id){
        $edit = Pemilih::join('angkatan','pemilih.pemilih_angkatan','angkatan.idangkatan')
        ->select('pemilih.*','angkatan.*')->where('pemilih.idpemilih', $id)->first();
        $angkatan = Angkatan::get();
        return view('admin.pemilih.edit')->with(compact('edit','angkatan'));

    }

    public function update(Request $request){
        $user = Pemilih::where('idpemilih', $request->idpemilih)->first();
        $update = collect($request->all()); 

                try {
                    $user->update($update->all());
                } catch (QE $e) {
                    alert('Error','Database Error', 'error');

                    return redirect()->back();
                }

                alert('Success','Berhasil Diubah', 'success');
                return redirect('pengelola/pemilih');

    } 

    public function delete($id){

        $user = Pemilih::where('idpemilih', $id)->first();
        try {
            $user->delete();
        } catch (QE $e) {
            alert('Error','Database Error', 'error');

            return redirect()->back();
        }

        alert('Success','Berhasil Dihapus', 'success');
        return redirect('pengelola/pemilih');
    }

    public function checkdpt(){
        return view('cekpemilih');
    }

    public function cekpemilih(Request $request){
        $user = Pemilih::where('pemilih_npm',$request->npm)->first();
        if(!empty($user)){
            return response()->json('Data is successfully added', 200);
        }else {
            return response()->json('NOT FOUND', 400);
        }
    }
}
