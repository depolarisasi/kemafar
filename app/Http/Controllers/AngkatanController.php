<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angkatan;
use Illuminate\Database\QueryException as QE;
Use Alert;

class AngkatanController extends Controller
{
    public function index(){
        $angkatan = Angkatan::get();
        return view('admin.angkatan.index')->with(compact('angkatan'));
    }

    public function new(){ 
        return view('admin.angkatan.new');
    }

    public function store(Request $request){ 
        $store = collect($request->all());
        try {
        Angkatan::create($store->all());
        } catch (QE $e) { 
            alert('Error','Database Error', 'error');
            return redirect()->back();
        }

        
        alert('Success','Berhasil Ditambahkan', 'success');

        return redirect('pengelola/angkatan');
    }

    public function edit($id){
        $edit = Angkatan::where('idangkatan', $id)->first();
        return view('admin.angkatan.edit')->with(compact('edit'));

    }

    public function update(Request $request){
        $user = Angkatan::where('idangkatan', $request->idangkatan)->first();
        $update = collect($request->all()); 

                try {
                    $user->update($update->all());
                } catch (QE $e) {
                    alert('Error','Database Error', 'error');

                    return redirect()->back();
                }

                alert('Success','Berhasil Diubah', 'success');
                return redirect('pengelola/angkatan');

    } 

    public function delete($id){

        $user = Angkatan::where('idangkatan', $id)->first();
        try {
            $user->delete();
        } catch (QE $e) {
            alert('Error','Database Error', 'error');

            return redirect()->back();
        }

        alert('Success','Berhasil Dihapus', 'success');
        return redirect('pengelola/angkatan');
    }
}
