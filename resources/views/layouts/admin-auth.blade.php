 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>PENGELOLA KPUM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{asset('adminasset/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('adminasset/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('adminasset/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>
    <body class="authentication-bg">
        <div class="account-pages my-5">
            @yield('content')

             <!-- end container -->
             </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="{{asset('adminasset/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('adminasset/js/app.min.js')}}"></script>
        
    </body>
</html>
