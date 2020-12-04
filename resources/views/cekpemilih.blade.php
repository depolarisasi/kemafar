@extends('layouts.main')
@section('title','Cek Pemilih - ')
@section('content')

<section class="py-5 " style="background: url({{asset('bg/4.png')}})  no-repeat center; background-size: cover;">
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-5">
            <div class="col-lg-12 text-center  mb-4 mb-lg-0">
              <h1 class="display-4 text-white nerko" >Cek
                <span class="text-primary-2">Hak</span> 
                Pilihmu</h1>
                <div class="my-4">
                  <p class="text-white lead">Isi NPM pada kolom dibawah ini untuk mengecek apakah kamu sudah terdaftar sebagai pemilih tetap pada pemilu 2020.</p>
                  <form id="myForm">
    @csrf 
    <div class="form-group row mt-4">
      <div class="col-md-4 offset-lg-4 offset-md-4">
      <input type="text" class="form-control border border-primary" id="npm" name="pemilih_npm">
      </div>
    </div> 
  <div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-lg btn-primary" id="submitnpm">Cek Hak Pilih</button>
    </div>
</div> 

  </form>
  <div id="msgs"></div>
              
                </div>

            
              </div>
               
            </div>
          </div>
        </section>

 
<style>
  #style4 {
    animation-name: style4;
    position: relative;
    animation-duration: 5s;
    animation-iteration-count: infinite;
  }

  @keyframes style4 {
    0% {right: 200px;}
    100% {right: 0px;}
  }

</style>

 
  @section('js')
  <script>
         $(document).ready(function(){
            $('#submitnpm').click(function(e){
               e.preventDefault();  
               $.ajax({
                  url: "{{ url('/cekpemilih') }}",
                  method: 'post',
                  data: {
                    _token : "{{csrf_token()}}",
                     npm: $('#npm').val(),  
                  },
                  success: function(result){
                    $('#msgs').html("<div class='alert alert-success'> NPM Tersebut Terdaftar Sebagai DPT</div>");
                  },
                  error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    $('#msgs').html("<div class='alert alert-danger'> NPM Tersebut Tidak Terdaftar Sebagai DPT ! Harap Hubungi Panitia KPUM !</div>");
            }});
               });
            });
      </script>
  @endsection 
@endsection