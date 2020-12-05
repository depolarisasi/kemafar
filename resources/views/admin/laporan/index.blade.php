@extends('layouts.admin')
@section('title', 'Laporan - ')
@section('content') 
<div class="row page-title align-items-center">
    <div class="col-sm-4 col-xl-6">
        <h4 class="mb-1 mt-0">Laporan</h4>
    </div>
    <div class="col-sm-8 col-xl-6">
       
    </div>
</div>

<!-- content -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body p-3"> 
            <h4 class="header-title mt-0 mb-1">Laporan</h4>
            <p class="sub-header">
              Berikut adalah laporan pelanggaran yang dilaporkan pengguna
            <br>
            </p>
            @if(!empty($laporan))
                <table id="basic-datatable"  class="table table-striped dt-responsive table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr> 
                            <th>Pelapor</th>
                            <th>Terlapor</th> 
                              <th>Isi Laporan</th> 
                              <th>Status Laporan</th> 
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($laporan as $a)
                        <tr>
                            <td>{{$a->laporan_pelapor}}</td>
                            <td>{{$a->laporan_terlapor}}</td> 
                            <td>{{substr($a->laporan_terlapor, 0, 40)}}....</td> 
                            <td>@if($a->laporan_status == 0)
                                <span class="badge badge-secondary">Belum Diproses</span>
                                @else
                                <span class="badge badge-success">Selesai Diproses</span>
                                @endif
                            </td> 
                               
                            <td>
                              <a href="{{url('pengelola/laporan/detail/'.$a->idlaporan)}}" class="btn btn-sm btn-primary"><i class="uil-info-circle"></i> Detail</a>
                                <a href="{{url('pengelola/laporan/proses/'.$a->idlaporan)}}" class="btn btn-sm btn-info"><i class="uil-edit"></i> Proses</a>
                                <button type="button" href="{{url('pengelola/laporan/delete/'.$a->idlaporan)}}" class="deletebtn btn btn-sm btn-danger"><i class="uil-trash"></i> Delete</button></td>
                        </tr>
                        @endforeach
                       
                        
                       
                    </tbody>
                </table>
@else
BELUM ADA ANGKATAN
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