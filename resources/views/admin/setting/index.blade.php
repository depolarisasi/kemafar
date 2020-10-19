@extends('layouts.admin')
@section('title', 'Setting - ')
@section('css')
<link href="{{asset('adminasset/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content') 
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Setting</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-3"> 
                                    <h4 class="header-title mt-0 mb-1">Setting</h4>
                                    <p class="sub-header">
                                      Pengaturan Sistem KPUM
                                    <br>
                                    </p>
                                         
<form method="POST" action="{{url('pengelola/setting/update')}}">
    @csrf
    <div class="form-group row mt-4">
        <label class="col-md-2" >Kunci Kotak Suara</label>
        <div class="col-md-3">
          <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" name="kuncikotak" @if($kuncikotak->setting_value == 1) value="on" checked @else @endif id="customSwitch1">
              <label class="custom-control-label" for="customSwitch1"></label>
            </div>
        </div>
      </div> 
    <div class="form-group row mt-4">
      <label class="col-md-2" >Tanggal Pembukaan Kotak Suara</label>
      <div class="col-md-3">
      <input type="text" class="form-control" name="tanggalbuka" id="tgldibuka" value="{{$tanggalbukakotak->setting_value}}" required autofocus>
      <small>Fungsi kotak suara untuk hasil rekap tidak akan bisa diakses sampai tanggal ini terpenuhi</small>
      </div>
    </div>
   
   

  <div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Update</button>
    </div>
</div>

  </form>
                                       
                                </div>
                                            </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
  

                        @section('js')
<script src="{{asset('adminasset/libs/flatpickr/flatpickr.min.js')}}"></script> 
<script>
$("#tgldibuka").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true}); 
</script>
@endsection
                        @endsection