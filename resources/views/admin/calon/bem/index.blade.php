@extends('layouts.admin')
@section('title', 'Calon BEM - ')
@section('content') 
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Calon BEM</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                               <a href="{{url('pengelola/calon-bem/new')}}" class="btn btn-md btn-primary text-white float-right ml-1"><i class='uil uil-file-alt mr-1'></i>Tambah</a> 
                               
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-3"> 
                                    <h4 class="header-title mt-0 mb-1">Daftar Calon BEM</h4>
                                    <p class="sub-header">
                                      Berikut ini calon Ketua dan Wakil Badan Eksekutif Mahasiswa.
                                    <br>
                                    </p>  
                                    @if(!empty($bem))
                                        <table id="basic-datatable"  class="table table-striped dt-responsive table-bordered nowrap" style="width:100%">
                                            <thead>
                                                <tr> 
                                                    <th width="30%">Foto Pasangan</th>
                                                    <th>Nama Calon</th>  
                                                    <th>Nomor Urut</th> 
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($bem as $a)
                                                <tr>
                                                    <td><img src="{{asset($a->calon_pasfoto)}}" class="img-fluid" style="width:100%; height: auto;"></td>
                                                    <td><p><b>{{$a->calon_namapasangan}}</b></p>
                                                <p>{{$a->calon_namaketua}} ({{$a->calon_npmketua}})</p>
                                            <p>{{$a->calon_namawakil}} ({{$a->calon_npmwakil}})</p></td>  
                                                    <td>{{$a->calon_nourut}}</td>  
                                                    <td>
                                                        <a href="{{url('pengelola/calon-bem/detail/'.$a->idcalonbem)}}" class="btn btn-sm btn-primary"><i class="uil-info-circle"></i></a> 
                                                        <a href="{{url('pengelola/calon-bem/edit/'.$a->idcalonbem)}}" class="btn btn-sm btn-warning"><i class="uil-edit"></i></a>
                                                        <button type="button" href="{{url('pengelola/calon-bem/delete/'.$a->idcalonbem)}}" class="deletebtn btn btn-sm btn-danger"><i class="uil-trash"></i></button></td>
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