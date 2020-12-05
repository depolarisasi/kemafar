<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laporan;

class laporanController extends Controller
{
    public function laporindex(){
        return view('lapor');
    }

    public function laporindexstore(Request $request){
        $store = collect($request->all());
        try {
        laporan::create($store->all());
        } catch (QE $e) { 
            alert('Error','Database Error', 'error');
            return redirect()->back();
        }

        
        alert('Success','Laporan Berhasil Disimpan ! Terima Kasih', 'success');

        return redirect('/lapor');
    }
    
    public function index(){
        $laporan = laporan::orderBy('idlaporan','DESC')->get();
        return view('admin.laporan.index')->with(compact('laporan'));
        
    }
    
    public function detail($id){
        $detail = laporan::where('idlaporan',$id)->first();
        return view('admin.laporan.detail')->with(compact('detail'));
    }
    
    public function proses($id){
        $laporan = laporan::where('idlaporan',$id)->first(); 
        
        try {
            $laporan->laporan_status = 1;
            $laporan->update();
    } catch (QE $e) { 
        alert('Error','Database Error', 'error');
        return redirect()->back();
    } 
    alert('Success','Laporan Berhasil Diproses ! Terima Kasih', 'success');

    return redirect('/pengelola/laporan');
    }
    
    public function delete($id){
        $laporan = laporan::where('idlaporan',$id)->first(); 
        
        try { 
            $laporan->delete();
    } catch (QE $e) { 
        alert('Error','Database Error', 'error');
        return redirect()->back();
    } 
    alert('Success','Laporan Berhasil Diproses ! Terima Kasih', 'success');

    return redirect('/pengelola/laporan');
    }
}
