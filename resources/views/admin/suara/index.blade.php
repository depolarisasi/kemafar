@extends('layouts.admin')
@section('title', 'Suara - ') 
@section('content') 
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Suara</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                            
                            </div>
                        </div>
                           <!-- content -->
                           <div class="row">
                            <div class="col-md-6">
                              <div class="card">
                                <div class="card-body p-3"> 
                                <h4 class="header-title mt-0 mb-1">Tabulasi Suara BEM</h4>
                                <div id="apex-pie-1" class="apex-charts" dir="ltr"></div>
                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-md-6">
                                      <div class="card">
                                          <div class="card-body p-3"> 
                                          <h4 class="header-title mt-0 mb-1">Tabulasi Suara BPM</h4> 
                                          <div class="row">
                                            @foreach($calon_bpm as $b)
                                            <div class="col-10 mb-2">
                                              <img src="{{asset($b->calon_pasfoto)}}" class="img-fluid rounded-circle" style="width: 48px; height:48px;">
                                           <p class="ml-2 d-inline-block"><b>{{$b->calon_namacalon}}</b> ({{$b->angkatan_tahun}})</p>
                                            </div>
                                            
                                            <div class="col-2 mb-2">
                                              <h2>{{$b->suara}}</h2>
                                            </div>
                                            @endforeach
                                          </div>
                                             
                                      </div>
                                                  </div> 
                                          </div>
                                </div>
 
                            </div>
                        </div>
  

                        @section('js') 
                        <!-- third party:js -->
                        <script src="{{asset('adminasset/libs/apexcharts/apexcharts.min.js')}}"></script>
                        <!-- third party end -->
                        <!-- Your application script --> 
<script src="{{asset('adminasset/libs/flatpickr/flatpickr.min.js')}}"></script> 
<script>
$("#tgldibuka").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true}); 
e = {
                chart: { height: 320, type: "pie" },
                series:  {!! json_encode($arrx, JSON_HEX_TAG) !!},
                labels:  {!! json_encode($calonbems, JSON_HEX_TAG) !!},
                legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: -10 },
                responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
            };
            new ApexCharts(document.querySelector("#apex-pie-1"), e).render();
</script>
@endsection
                        @endsection