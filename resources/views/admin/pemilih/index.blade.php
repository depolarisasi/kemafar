@extends('layouts.admin')
@section('title', 'Pemilih - ')
@section('content') 
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Pemilih</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                               <a href="{{url('pengelola/pemilih/new')}}" class="btn btn-md btn-primary text-white float-right ml-1"><i class='uil uil-file-alt mr-1'></i>Tambah</a> 
                               <a href="{{url('pengelola/pemilih/import')}}" class="btn btn-md btn-primary text-white float-right ml-1"><i class='uil uil-file-alt mr-1'></i>Upload</a> 
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-3"> 
                                    <h4 class="header-title mt-0 mb-1">Daftar Pemilih</h4>
                                    <p class="sub-header">
                                      Berikut ini pemilih sebagai kategori dari pemilih & calon.
                                    <br>
                                    </p>  
                                    @if(!empty($pemilih))
                                        <table id="basic-datatable"  class="table table-striped dt-responsive table-bordered nowrap" style="width:100%">
                                            <thead>
                                                <tr> 
                                                    <th>NPM</th>
                                                    <th>Nama</th> 
                                                    <th>Angkatan</th> 
                                                    <th>Menggunakan Hak Pilih ?</th> 
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($pemilih as $a)
                                                <tr>
                                                    <td>{{$a->pemilih_npm}}</td>
                                                    <td>{{$a->pemilih_nama}}</td> 
                                                    <td>{{$a->angkatan_tahun}}</td>
                                                    <td>@if($a->pemilih_status == 1)
    
                                                    @else
                                                    Belum Memilih
                                                    @endif
                                                    </td>  
                                                    <td>
                                                       <!-- <a href="{{url('pengelola/pemilih/detail/'.$a->idpemilih)}}" class="btn btn-sm btn-primary"><i class="uil-info-circle"></i></a> -->
                                                        <a href="{{url('pengelola/pemilih/edit/'.$a->idpemilih)}}" class="btn btn-sm btn-warning"><i class="uil-edit"></i></a>
                                                        <button type="button" href="{{url('pengelola/pemilih/delete/'.$a->idpemilih)}}" class="deletebtn btn btn-sm btn-danger"><i class="uil-trash"></i></button></td>
                                                </tr>
                                                @endforeach
                                               
                                                
                                               
                                            </tbody>
                                        </table>
@else
BELUM ADA PEMILIH
@endif
                                       
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