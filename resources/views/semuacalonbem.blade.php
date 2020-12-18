@extends('layouts.main')
@section('title','Cek Pemilih - ')
@section('content')

<section class="py-5 ">
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-5">
            <div class="col-lg-12 text-center  mb-4 mb-lg-0">
              <h1 class="display-4 text-white nerko">Kenali
                <span class="text-primary-2">Calon</span> 
                Pemimpinmu</h1>
                <div class="my-4">
                  <p class="lead text-white">Kenali lebih dekat, siapa mereka, apa visi dan misi mereka dan apa yang akan mereka rencanakan untuk kampusmu !</p>
                   
              
                </div>

            
              </div>
              <div class="row mt-3"> 
                <div class="col-12 text-center mb-3">
                  
                <h2 class="text-center nerko text-white">Pasangan Calon Ketua & Wakil Ketua BEM</h2>
                </div>
                
                @foreach($bem as $b)
                <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="card border">
                  <img src="{{asset($b->calon_pasfoto)}}" class="card-img-top img-fluid fotopasangan">
                  <div class="card-body p-3">
                    <h3 class="card-title mb-2">{{$b->calon_nourut}} - {{$b->calon_namapasangan}}</h3>
                    <p class="card-text"><b>{{$b->calon_slogan}}</b>
                      <br><b>{{$b->calon_namaketua}}</b> ({{$b->calon_npmketua}}) & <b>{{$b->calon_namawakil}}</b> ({{$b->calon_npmwakil}})  </p>
                  </div> 
                  <div class="card-footer p-3">
                    <a href="{{url('calon/bem/'.$b->calon_nourut)}}" class="btn btn-md btn-primary">Lihat Profil, Visi Misi & Program Kerja</a> 
                  </div>
                </div>
              </div>
                @endforeach
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