<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonBem;
use App\Models\Angkatan; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\QueryException as QE;

class CalonController extends Controller
{

    // BEM //
    public function indexbem(){
        $bem = CalonBem::get();
        return view('admin.calon.bem.index')->with(compact('bem'));
    }

    public function newbem(){ 
        $angkatan = Angkatan::get();
        return view('admin.calon.bem.new')->with(compact('angkatan'));
    }

    public function storebem(Request $request){ 
        $cekNoUrut = CalonBem::where('calon_nourut', $request->calon_nourut)->first();
        if($cekNoUrut){
            
            alert('Error','Nomor Urut Sudah Digunakan', 'error');

            return redirect()->back();
        }else {
            
        $store = collect($request->all());

        if ($request->file('fotosuratsuara') == '') {
        } else {
            $file = $request->file('fotosuratsuara');
            $fileArray = ['image' => $file];
            $rules = ['image' => 'mimes:jpeg,jpg,png,gif|required|max:1000000'];
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                // Redirect or return json to frontend with a helpful message to inform the user
                // that the provided file was not an adequate type

                alert('Error','File yang diunggah bukan gambar', 'error');

                return redirect()->back();
            } else {
                // Store the File Now
                // read image from temporary file
                $filefoto = time().'PASFOTO_CALON_'.$file->getClientOriginalName();
                Image::make($file)->save('fotosuratsuara/'.$filefoto);
                $store->put('calon_pasfoto', 'fotosuratsuara/'.$filefoto);        
            }
        }
        try {
        CalonBem::create($store->all());
        } catch (QE $e) { 
            alert('Error','Database Error', 'error');
            return $e;
        }

        
        alert('Success','Berhasil Ditambahkan', 'success');

        return redirect('pengelola/calon-bem');
        }
    }

    public function editbem($id){
        $edit = CalonBem::join('angkatan','calonbem.calon_angkatanketua','=','angkatan.idangkatan')
        ->select('calonbem.*','angkatan.*')
        ->where('calonbem.idcalonbem', $id)->first(); 
        $angkatan = Angkatan::get();
        return view('admin.calon.bem.edit')->with(compact('edit','angkatan'));

    }

    public function updatebem(Request $request){
        $cekNoUrut = CalonBem::where('calon_nourut', $request->calon_nourut)->first();
        $cekNoUrutSama = CalonBem::where('idcalonbem', $request->idcalonbem)->first();
        if($cekNoUrut && $cekNoUrutSama == $request->idcalonbem){
            
            alert('Error','Nomor Urut Sudah Digunakan', 'error');

            return redirect()->back();
        }else {
        $bem = CalonBem::where('idcalonbem', $request->idcalonbem)->first();
        $update = collect($request->all()); 
        
        if ($request->file('fotosuratsuara') == '') {
            $update->put('calon_pasfoto', $bem->calon_pasfoto); 
        } else {
            $file = $request->file('fotosuratsuara');
            $fileArray = ['image' => $file];
            $rules = ['image' => 'mimes:jpeg,jpg,png,gif|required|max:1000000'];
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                // Redirect or return json to frontend with a helpful message to inform the user
                // that the provided file was not an adequate type

                alert('Error','File yang diunggah bukan gambar', 'error');

                return redirect()->back();
            } else {
                // Store the File Now
                // read image from temporary file
                $filefoto = time().'PASFOTO_CALON_'.$file->getClientOriginalName();
                Image::make($file)->save('fotosuratsuara/'.$filefoto);
                $update->put('calon_pasfoto', 'fotosuratsuara/'.$filefoto);        
            }
        }

                try {
                    $bem->update($update->all());
                } catch (QE $e) {
                    alert('Error','Database Error', 'error');

                    return redirect()->back();
                }

                alert('Success','Berhasil Diubah', 'success');
                return redirect('pengelola/calon-bem');
            }
    } 

    public function deletebem($id){

        $user = CalonBem::where('idcalonbem', $id)->first();
        try {
            $user->delete();
        } catch (QE $e) {
            alert('Error','Database Error', 'error');

            return redirect()->back();
        }

        alert('Success','Berhasil Dihapus', 'success');
        return redirect('pengelola/calon-bem');
    }

    public function showbem($id){
        $bem = CalonBem::join('angkatan','calonbem.calon_angkatanketua','=','angkatan.idangkatan')
        ->select('calonbem.*','angkatan.*')
        ->where('calonbem.idcalonbem',$id)->first();
        return view('admin.calon.bem.show')->with(compact('bem'));
    }

    public function kenalicalon(){
        $bem = CalonBem::join('angkatan','calonbem.calon_angkatanketua','=','angkatan.idangkatan')
        ->select('calonbem.*','angkatan.*')->orderBy('calonbem.calon_nourut','asc')->get();
        return view('kenalicalon')->with(compact('bem'));
    }
}
