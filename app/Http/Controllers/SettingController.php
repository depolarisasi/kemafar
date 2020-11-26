<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingController extends Controller
{ 
    public function setting(){
    $kuncikotak = Settings::where('idsetting',1)->first();
    $tanggalpemilihan = Settings::where('idsetting',3)->first();
    return view('admin.setting.index')->with(compact('kuncikotak','tanggalpemilihan'));
}

public function updatesetting(Request $request){

    $tanggalpemilihan = Settings::where('idsetting',3)->first();
    $tanggalpemilihan->setting_value = $request->tanggalpemilihan; 
    try { 
        $tanggalpemilihan->update();
        } catch (QE $e) { 
            alert('Error','Database Error', 'error');
            return redirect()->back();
        }
        
    alert('Success','Setting berhasil diterapkan', 'success');

    return redirect()->back();
}
}
