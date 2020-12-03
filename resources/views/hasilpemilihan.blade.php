@extends('layouts.main') 
@section('content')

<section class="o-hidden mt-5 py-5 ">
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-5">
            <div class="col-lg-12 text-center text-lg-left mb-4 mb-lg-0">
              <h1 class="display-4 nerko text-center">Hasil Pemilihan Umum KMFH 2020</h1>
                 <!-- content -->
                 <div class="row">
                            <div class="col-md-7">
                              <div class="card">
                                <div class="card-body p-3"> 
                                <h4 class="header-title mt-0 mb-1 nerko">Tabulasi Suara BEM</h4>
                                <div id="apex-pie-1" class="apex-charts" dir="ltr"></div>
                                <table class="table mt-2">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Pasangan</th>
      <th scope="col">Suara Hari 1</th>
      <th scope="col">Suara Hari 2</th>
      <th scope="col">Suara Hari 3</th>
      <th scope="col">Total Suara Masuk</th>
    </tr> 
  </thead>
  <tbody>
  @foreach($pasangancalon as $p) 
    <tr>
      <th scope="row">{{$p->calon_namapasangan}}</th>

      <td>{{$arrayhasil[$p->idcalonbem]['hari1']}}</td>
      <td>{{$arrayhasil[$p->idcalonbem]['hari2']}}</td>
      <td>{{$arrayhasil[$p->idcalonbem]['hari3']}}</td>
      <td>{{$arrayhasil[$p->idcalonbem]['totalcalon']}}</td>
    </tr> 
  @endforeach
  <tr>
      <th scope="row">Suara Tidak Sah / Kosong</th>

      <td>{{$arraytidaksah['hari1']}}</td>
      <td>{{$arraytidaksah['hari2']}}</td>
      <td>{{$arraytidaksah['hari3']}}</td>
      <td>{{$arraytidaksah['totalgolput']}}</td>
    </tr> 
    
  </tbody>
</table>
<p><small>* Bukan hasil suara realtime, terdapat delay 10 menit dengan realtime untuk mencegah overload server</small></p>

                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-md-5">
                                      <div class="card">
                                          <div class="card-body p-3"> 
                                          <h4 class="header-title mt-0 mb-1 nerko">Tabulasi Suara BPM</h4> 
                                          <div class="row">
                                            @foreach($calon_bpm as $b)
                                            <div class="col-10 mb-2">
                                              <img src="{{asset($b->calon_pasfoto)}}" class="img-fluid rounded-circle" style="width: 48px; height:48px;">
                                           <p class="ml-2 d-inline-block"><b>{{substr($b->calon_namacalon,0,20)}}</b> ({{$b->angkatan_tahun}})</p>
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
            </div>
          </div>
        </section>

 
<section class="o-hidden mt-1 py-1 ">
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-2">
            <div class="col-lg-12 text-center text-lg-left mb-4 mb-lg-0">
              <h1 class="display-4 text-center nerko">Informasi Pemilih & Sebaran Data</h1>
              <p><b>Pemilih Berdasarkan Angkatan</b></p>
              <table class="table mt-2">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Jumlah Terdaftar</th>
                    <th scope="col">Jumlah Pemilih</th> 
                  </tr> 
                </thead>
                <tbody>
                @foreach($petaangkatan as $p)
                  <tr>
                    <th scope="row">{{$p['angkatan']}}</th> 
                    <td>{{$p['jumlah_pendaftar']}}</td>
                    <td>{{$p['jumlah_pemilih']}}</td> 
                  </tr> 
                  @endforeach 
                </tbody>
              </table>
                </div> 
                <div class="col-lg-12 text-center text-lg-left mb-4 mb-lg-0">
                
                  <p><b>Pemilih Berdasarkan Pilihan</b></p>
                  <table class="table mt-2">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Calon</th>
                        @foreach($petaangkatan as $p) 
                        <th scope="row">{{$p['angkatan']}}</th>    
                      @endforeach  
                     
                    </tr> 
                    </thead>
                    <tbody>
                    @foreach($pemetaanpilihan as $pe)
                    <tr>
                      <th scope="row"> 
                        <img src="{{asset($pe['infocalon']['calon_pasfoto'])}}" class="img-fluid rounded-circle" style="width: 48px; height:48px;">
                        <p class="ml-2 d-inline-block"><b>{{$pe['infocalon']['calon_nourut']}} - {{$pe['infocalon']['calon_namapasangan']}}</p>
                      </th> 
                      @foreach($pe['pemilih'] as $p)
                      
                      <td>{{$p['jumlah_pemilih']}}</td>
                      
                      @endforeach
                        
                    </tr> 
                      @endforeach 
                    </tbody>
                  </table>
               
                    </div>
              </div> 
            </div>
          </div>
        </section>

 
       
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
                labels: ["Macan Asia", "Joma",],
                legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: -10 },
                responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
            };
            new ApexCharts(document.querySelector("#apex-pie-1"), e).render();
</script>
@endsection
@endsection