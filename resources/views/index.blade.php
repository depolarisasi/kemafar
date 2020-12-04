@extends('layouts.main')
@section('title',"")
@section('content')
  
<section class="bg-primary-alt o-hidden py-5" style="background: url({{asset('bg/1.jpg')}})  no-repeat center; background-size: cover;"> 
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-5">
            <div class="col-lg-7 text-center text-lg-left mb-5 mt-3">
            <p class="text-white lead mt-5">Selamat Datang Kemafar.</p>
              <h1 class="text-white nerko display-4">Kemafar
                <span class="text-primary-2">Memilih</span></h1>
                <div class="my-4 mt-5">
                  <p class="text-white lead">Corona bukan alasan untuk tidak menggunakan hak
pilihmu.</p>
                </div>
                <a class="text-white btn btn-lg btn-primary " href="{{url('pilih')}}">Gunakan Hak Pilih</a>
              </div>
              <div class="col-lg-5 text-center"> 
              </div>
            </div>
          </div>
        </section>


        <section class="pt-0 pt-md-5 pt-xl-7">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-12 d-flex align-items-center">
                <div>
                  <h2 class="display-4 nerko ">Kenalan Yuk !</h2> 
                    </div>
                  </div>
              <div class="col-md-12 order-md-last mb-4 mb-md-0">
                <div class="row mt-3  d-flex align-items-center"> 
                  <div class="col-12 text-center mb-3"> 
                  <h2 class="text-center  nerko ">Pasangan Calon Ketua & Wakil Ketua BEM</h2>
                  </div>
                  
                  @foreach($calonbem as $b)
                  <div class="col-md-6 col-lg-6 col-sm-12  ">
                  <div class="card border">
                    <img src="{{asset($b->calon_pasfoto)}}" class="card-img-top img-fluid  fotopasangan">
                    <div class="card-body p-2 pb-0">
                      <h3 class="card-title mb-2  nerko ">{{$b->calon_nourut}} - {{$b->calon_namapasangan}}</h3> 
                      <p class="card-text"><b>{{$b->calon_namaketua}}</b> ({{$b->calon_npmketua}}) & <b>{{$b->calon_namawakil}}</b> ({{$b->calon_npmwakil}})  </p>
                    </div> 
                    <div class="card-footer p-3">
                      <a href="{{url('calon/bem/'.$b->calon_nourut)}}" class="btn btn-md btn-primary">Lihat Profil, Visi Misi & Program Kerja</a> 
       
                    </div> 
                    
                  </div>
                </div>
                  @endforeach
                </div>
                 
                <div class="row mt-3"> 
                  <div class="col-12 text-center mb-3" > 
                  <h2 class="text-center"> Calon Anggota BPM</h2>
                  </div>  
                  @foreach($calonbpm as $p)
                  <div class="col-md-4 col-lg-4 col-sm-6" >
                  <div class="card border" style="max-width: 20em;">
                    <img src="{{asset($p->calon_pasfoto)}}" class="card-img-top img-fluid fotopasangan">
                    <div class="card-body p-3">
                      <h5 class="card-title mb-2  nerko ">{{$p->calon_namacalon}}</h5>
                      <p class="card-text"><b> NO URUT {{$p->calon_nourut}}</b><br><span class="badge badge-info">Angkatan {{$p->angkatan_tahun}}</span></p>
                    </div> 
                    
                  </div>
                </div>
                  @endforeach
                </div> 
<div class="text-center">
                <a class="text-white btn btn-lg btn-primary" href="{{url('calon')}}">Kenali Calon Lebih Dekat</a>
              </div>
              </div>
               
                </div>
                </div>
              </section>

   <section class="pt-0 pt-md-5 pt-xl-7 layer-4" style="background: url({{asset('bg/2.jpg')}})  no-repeat center; background-size: cover;">
     <div class="decoration-wrapper d-none d-lg-block">
       
      </div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-4">
            <img src="{{asset('assets/images/logo.png')}}" class="col-md-11" id="style3"></div>
            <div class="col-md-6 mb-4">
              <h2 class="h1 mb-4 text-white nerko ">Sekilas tentang KPU</h2>
              <ul class="list-unstyled"><li class="d-flex py-2">
                <div class="icon-round icon-round-full icon-round-xs bg-primary mr-2">
                  <svg class="injected-svg icon bg-white" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M18.1206 5.4111C18.5021 4.92016 19.1753 4.86046 19.6241 5.27776C20.073 5.69506 20.1276 6.43133 19.746 6.92227L10.6794 18.5889C10.2919 19.0876 9.60523 19.1401 9.15801 18.7053L4.35802 14.0386C3.91772 13.6106 3.87806 12.8732 4.26944 12.3916C4.66082 11.91 5.33503 11.8666 5.77533 12.2947L9.76023 16.1689L18.1206 5.4111Z" fill="#212529"></path></svg>
                </div>
                <span class="lead text-white mt-n1"><strong>Apa itu KPU Kemafar?</strong> KPU Kemafar adalah lembaga penyelanggara pemilihan umum yang bersifat
                  independen yang bertugas melaksanakan pemilihan umum. Pemilu
                  merupakan rangkaian acara yang bertujuan untuk melakukan pemilihan Ketua
                  dan Wakil ketua BEM, serta BPM sebagai senator dari tiap angkatan
                  </span>
                </li>
                <li class="d-flex py-2">
                  <div class="icon-round icon-round-full icon-round-xs bg-primary mr-2">
                  <svg class="injected-svg icon bg-white" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M18.1206 5.4111C18.5021 4.92016 19.1753 4.86046 19.6241 5.27776C20.073 5.69506 20.1276 6.43133 19.746 6.92227L10.6794 18.5889C10.2919 19.0876 9.60523 19.1401 9.15801 18.7053L4.35802 14.0386C3.91772 13.6106 3.87806 12.8732 4.26944 12.3916C4.66082 11.91 5.33503 11.8666 5.77533 12.2947L9.76023 16.1689L18.1206 5.4111Z" fill="#212529"></path></svg>
                </div>
                <span class="lead  text-white  mt-n1"><strong>Asas Asas KPU</strong> 
                  Pemilu Kemafar dilaksanakan berdasarkan asas langsung, bebas, rahasia,
                  jujur, adil, dan demokratis </span></li>
                   
                </ul>
 
              </div>
            </div>
          </div>
        </section>
      
<section class="bg-primary text-light py-2 py-md-1 o-hidden" style="background: url({{asset('bg/3.png')}})  no-repeat center; background-size: cover;">
 
 <div class="container align-items-center text-center text-md-left">
   <div class="row py-6 align-items-center"> 
       <div class="col-12  d-flex flex-column justify-content-center"><div>
         <span class="badge badge-primary-2 mb-2 lead">Siap gunakan hak pilih ?</span>
         <h2 class="h1 nerko">Tentukan Masa Depan Kampusmu Sekarang</h2>
         <p class="lead">Join google meet, masukkan kode rahasia dengan kode unik yang akan diberikan oleh admin, hanya 5 menit!.</p>
         <a href="{{url('pilih')}}" class="btn btn-lg btn-white mt-3">Gunakan Hak Pilih</a>
       </div>
     </div>
   </div>
 </div>
</section>
@endsection