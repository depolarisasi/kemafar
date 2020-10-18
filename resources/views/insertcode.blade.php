@extends('layouts.main')
@section('title','Gunakan Hak Pilih - ')
@section('content')

<section class="py-5 ">
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-5">
            <div class="col-lg-12 text-center  mb-4 mb-lg-0">
              <h1 class="display-4"> Tentukan Pilihan</h1>
                <div class="my-4">
                  <p class="lead">Isi kode rahasia yang dikirim ke email Student Unpad untuk menggunakan hak pilih.</p>
                  <p><small>Kami menggunakan teknologi Cookies & Javascript, pastikan browser kamu mengaktifkan fitur Javascript dan menerima Cookies.</small></p>
                  <form method="POST" action="{{url('pilih')}}">
    @csrf 
    <div class="form-group row mt-4">
      <div class="col-md-4 offset-lg-4 offset-md-4 col-sm-12">
      <input type="text" class="form-control border border-primary" placeholder="Masukan Kode Rahasia" name="secretcode">
      </div>
    </div> 
  <div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-lg btn-primary">Gunakan Hak Pilih</button>
    </div>
</div> 

  </form>
  <div id="msgs"></div>
              
                </div>

            
              </div>
               
            </div>
          </div>
        </section>

 
 
       
 
@endsection