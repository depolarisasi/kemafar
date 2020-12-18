@extends('layouts.main')
@section('title','Cek Pemilih - ')
@section('content')

<div class="background-1">
<section class="py-5 ">
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-5">
            <div class="col-lg-12 text-center  mb-4 mb-lg-0">
              <h1 class="display-4 nerko text-white">Kenali
                <span class="text-primary-2">Calon</span> 
                Pemimpinmu</h1>
                <div class="my-4">
                  <p class="lead text-white">Kenali lebih dekat, siapa mereka, apa visi dan misi mereka dan apa yang akan mereka rencanakan untuk kampusmu !</p>
                   
              
                </div>
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
                    <h3 class="card-title mb-2 nerko">{{$b->calon_nourut}} - {{$b->calon_namapasangan}}</h3>
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
               
              <div class="row mt-3"> 
                <div class="col-12 text-center mb-3">
                  
                <h2 class="text-center nerko text-white" > Calon Anggota BPM</h2>
                </div>
                
                @foreach($bpm as $p)
                <div class="col-md-4 col-lg-4 col-sm-6">
                <div class="card border">
                  <img src="{{asset($p->calon_pasfoto)}}" class="card-img-top img-fluid fotopasangan">
                  <div class="card-body p-3">
                    <h5 class="card-title mb-2 nerko">{{$p->calon_namacalon}}</h5>
                    <p class="card-text"><b> NO URUT {{$p->calon_nourut}}</b><br><span class="badge badge-info">Angkatan {{$p->angkatan_tahun}}</span></p>
                  </div> 
                  <div class="card-footer p-3">
                    <a href="{{url('calon/bpm/'.$p->idcalonbpm)}}" class="btn btn-md btn-primary">Lihat Profil & Visi, Misi </a> 
                  </div>
                </div>
              </div>
                @endforeach
              </div>
            </div>
          </div>
        </section>

 
 
      
<section class="text-light py-2 py-md-1 o-hidden">
 
    <div class="container align-items-center text-center text-md-left">
      <div class="row py-6 align-items-center"> 
          <div class="col-12  d-flex flex-column justify-content-center"><div>
            <span class="badge badge-primary-2 mb-2 lead">Siap gunakan hak pilih ?</span>
            <h2 class="h1 nerko">Tentukan Masa Depan Kemafar Sekarang</h2>
            <p class="lead">Join google meet, masukkan kode rahasia dengan kode unik yang akan diberikan oleh admin, hanya 5 menit!.</p>
            <a href="{{url('pilih')}}" class="btn btn-lg btn-white mt-3">Gunakan Hak Pilih</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
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