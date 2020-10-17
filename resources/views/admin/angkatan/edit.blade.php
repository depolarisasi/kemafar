@extends('layouts.admin')
@section('title', 'Ubah Angkatan - ')
@section('content') 
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Ubah Angkatan</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                               <a href="{{url('pengelola/angkatan')}}" class="btn btn-md btn-primary text-white float-right">Kembali</a> 
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-3"> 
                                    <h4 class="header-title mt-0 mb-1">Ubah Angkatan</h4> 
                                   
<form method="POST" action="{{url('pengelola/angkatan/edit')}}">
    @csrf
    <input type="hidden" name="idangkatan" value="{{$edit->idangkatan}}">
    <div class="form-group row mt-4">
      <label class="col-md-2" >Nama Angkatan</label>
      <div class="col-md-3">
      <input type="text" class="form-control" name="angkatan_nama" value="{{$edit->angkatan_nama}}" required autofocus>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Tahun Angkatan</label>
      <div class="col-md-3">
      <input type="text" class="form-control" name="angkatan_tahun"  value="{{$edit->angkatan_tahun}}" required>

      </div>
    </div> 
   
   

  <div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Ubah Angkatan</button>
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
        <!-- datatable js -->
        <script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>>
<script src="{{asset('assets/libs/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>


<script>
$(document).ready(function(){
    

    $(document).on('click', '.deletebtn', function(e) {
       var href = $(this).attr('href');
       Swal.fire({
   title: 'Yakin untuk menghapus akun ini ? ',
   text: 'SEMUA DATA mengenai akun ini akan dihapus dan tidak dapat dikembalikan!',
   icon: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#95000c',
   confirmButtonText: 'Ya, Hapus!',
   cancelButtonText: 'Tidak, batalkan'
 }).then((result) => {
   if (result.value) {
      window.location.href = href;
  
   //  For more information about handling dismissals please visit
   // https://sweetalert2.github.io/#handling-dismissals
   } else if (result.dismiss === Swal.DismissReason.cancel) {
     Swal.fire(
       'Dibatalkan',
       'Data tidak jadi dihapus',
       'error'
     )
   }
 });
 
      }); 
 
  
                        });

       
       var table = $("#basic-datatable").DataTable({
            
             language: { paginate: { 
                previous: "<i class='uil uil-angle-left'>", 
                next: "<i class='uil uil-angle-right'>" } },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
            }
                        });
               
                        </script>
@endsection

                        @endsection