@extends('layouts.main')
@section('title','Laporan Pelanggaran - ')
@section('content')
<div class="background-2">
<section class="py-5 ">
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-5">
            <div class="col-lg-12 text-center  mb-4 mb-lg-0">
              <h1 class="display-4 nerko text-white">Laporkan Pelanggaran</h1>
                                      
<form method="POST" action="{{url('lapor')}}">
    @csrf
     
    <div class="form-group row mt-4">
      <label class="col-md-2" >Nama & Kontak Pelapor</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="laporan_pelapor"  required autofocus>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Nama Terlapor</label>
      <div class="col-md-4">
      <input type="text" class="form-control" name="laporan_terlapor"  required autofocus>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Isi Laporan</label>
      <div class="col-md-10">
        <textarea name="laporan_isi" class="form-control my-editor" rows="10"></textarea>
      </div>
    </div> 
   <p class="text-white"><b>Pihak panitia akan menghubungi pelapor untuk dimintai bukti</b></p>
   

  <div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Laporkan</button>
    </div>
</div>

  </form>

            
              </div>
               
            </div>
          </div>
        </section>

</div>
 
       
 
@endsection