<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Suara Mahasiswa - Komisi Pemilihan Umum Mahasiswa FH Unpad</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Suara Mahasiswa - Aplikasi Pemilu Online Kampus">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}"> <!-- Resource style -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.accordion.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link href="{{asset('assets/css/all.css')}}" rel="stylesheet"> <!--load all styles -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    @yield('css')
  </head>
  <body>
    
  @include('sweetalert::alert')
    <div class="wrapper">
      <div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
          <div class="container">
            <a class="navbar-brand" href="/">Suara Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto navbar-right">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/')}}">Home</a></li>  
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/cek-pemilih')}}">Cek Status Pemilih</a></li>  
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/calon')}}">Kenali Calon</a></li>   
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/panduan')}}">Cara Memilih</a></li>    
                <li class="nav-item"><a class="nav-link btn btn-sm btn-info" href="{{url('/pilih')}}" style="color:white;">Pilih  Sekarang</a></li>    
              </ul>
              </ul>
            </div>
          </div>
        </nav>
      </div>


      <div id="main" class="main" style="margin-top:72px">
   @yield('content')
@include('layouts.footer')
 

</div>
    </div><!-- Wrapper -->


    <!-- Jquery and Js Plugins -->
    <script src="{{asset('assets/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/jquery.accordion.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @yield('js')
  </body>
</html>
