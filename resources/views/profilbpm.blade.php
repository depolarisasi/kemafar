@extends('layouts.main')
@section('title','Profil Calon '.$detail->calon_namacalon.' - ')
@section('content')
<section class="o-hidden py-5 ">
            <div class="container">
          <div class="row align-items-center flex-column-reverse flex-md-row min-vh-40 mt-5">
            <div class="col-lg-7 text-center text-lg-left mb-4 mt-2 mb-lg-0">
              <h1 class="display-4 nerko">{{$detail->calon_namacalon}}</h1> 
                <div class="my-2">  
                  <p class="lead"> <span class="badge badge-primary">Angkatan {{$detail->angkatan_tahun}}</span>  <span class="badge badge-secondary">Nomor Urut {{$detail->calon_nourut}}</span></p>
                </div> 
              </div>
              <div class="col-lg-5 text-center">
                <img src="{{asset($detail->calon_pasfoto)}}" class="img-fluid">
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-12">
                <h2 class="nerko">Biografi Calon</h2>
                {!! $detail->calon_biografi !!}
              </div>

              <div class="col-md-12 mt-5">
                <h2 class="nerko">Visi, Misi & Program Kerja Calon</h2>
                {!! $detail->calon_prokervisimisi !!}
              </div>
            </div>
          </div>
        </section>

 
  

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