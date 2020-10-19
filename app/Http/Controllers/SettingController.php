<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingController extends Controller
{
    public function setting(){
        $kuncikotak = Settings::where('idsetting',1)->first();
        $tanggalbukakotak = Settings::where('idsetting',2)->first();
        return view('admin.setting.index')->with(compact('kuncikotak','tanggalbukakotak'));
    }

    public function updatesetting(Request $request){

        
        $kuncikotak = Settings::where('idsetting',1)->first();
        if(!empty($request->kuncikotak)){
            $kuncikotak->setting_value = 1;
        }else {
            $kuncikotak->setting_value = 0;
        }
        $tanggalbukakotak = Settings::where('idsetting',2)->first();
        $tanggalbukakotak->setting_value = $request->tanggalbuka; 
        try {
            $kuncikotak->update();
            $tanggalbukakotak->update();
            } catch (QE $e) { 
                alert('Error','Database Error', 'error');
                return redirect()->back();
            }
            
        alert('Success','Setting berhasil diterapkan', 'success');

        return redirect()->back();
    }
}
