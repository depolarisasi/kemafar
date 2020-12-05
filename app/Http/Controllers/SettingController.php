<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingController extends Controller
{ 
    public function setting(){
        $tanggalpemilihan = Settings::where('idsetting',3)->first();
        $jammulaipemilihan = Settings::where('idsetting',4)->first();
        $jamakhirpemilihan = Settings::where('idsetting',5)->first();
        return view('admin.setting.index')->with(compact('tanggalpemilihan','jammulaipemilihan','jamakhirpemilihan'));
    }

public function updatesetting(Request $request){
    $tanggalpemilihan = Settings::where('idsetting',3)->first();
    $tanggalpemilihan->setting_value = $request->tanggalpemilihan; 

    $jammulaipemilihan = Settings::where('idsetting',4)->first();
    $jammulaipemilihan->setting_value = $request->jammulaipemilihan; 

    $jamakhirpemilihan = Settings::where('idsetting',5)->first();
    $jamakhirpemilihan->setting_value = $request->jamakhirpemilihan; 
    try { 
        $tanggalpemilihan->update();
        $jammulaipemilihan->update();
        $jamakhirpemilihan->update();
        } catch (QE $e) { 
            alert('Error','Database Error', 'error');
            return redirect()->back();
        }
        
    alert('Success','Setting berhasil diterapkan', 'success');

    return redirect()->back();
}
}
