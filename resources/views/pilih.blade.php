@extends('layouts.main')
@section('title','Pilih - ')
@section('css') 
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@endsection
@section('content')

<section class="py-5 ">
            <div class="container">
          <div class="row align-items-center min-vh-40 mt-5">
            <div class="col-lg-12 text-center  mb-4 mb-lg-0">
              
                <div class="my-1"> 
                  <form method="POST" action="{{url('pilih/calon')}}">
                    @csrf
                    <input type="hidden" name="suara_idpemilih" value="{{$idpem}}">
                  <div clsas="row">
                    <div class="col-12"> 
              <h3 class="nerko">Calon Pasangan Ketua & Wakil Ketua BEM</h3>
                    </div>
                  </div>
                  <div class="grid mb-5 ">
                    @foreach($bem as $b)
                    <label class="card">
                      <input name="suara_calidbem" class="radio" type="radio" value="{{$b->idcalonbem}}" required> 
                      <span class="plan-details noborder">
                        <span class="plan-type">{{$b->calon_nourut}}</span>
                         <img src="{{asset($b->calon_pasfoto)}}" class="img-fluid mt-2 mb-2" style="height: 250px;">
                         <h3>{{$b->calon_namapasangan}}</h3>
                        <span><b>{{$b->calon_namaketua}} & {{$b->calon_namawakil}}</b></span> 
                      </span>
                    </label>
                    @endforeach 
                  </div>
                  <hr>
                  <div clsas="row  mt-5 pt-5">
                    <div class="col-12"> 
              <h3 class="nerko">Calon Anggota BPM</h3>
                    </div>
                  </div>
                  <div class="grid">
                    @foreach($bpm as $p)
                    <label class="card noborder">
                      <input name="suara_calidbpm" class="radio" type="radio"  value="{{$p->idcalonbpm}}" required> 
                      <span class="plan-details noborder">
                        <span class="plan-type">{{$p->calon_nourut}}</span>
                         <img src="{{asset($p->calon_pasfoto)}}" class="img-fluid mt-2 mb-2"  style="height: 250px;"> 
                         <h3>{{$p->calon_namacalon}}</h3>
                         <span>Calon Anggota BPM</span> 
                      </span>
                    </label>
                    @endforeach 
                  </div>

                  <div clsas="row  mt-5 pt-5">
                    <div class="col-12">  
                      <button class="btn btn-lg btn-primary" type="submit">Pilih</button>
                    </div>
                  </div>
                </form>
                </div>

            
              </div>
               
            </div>
          </div>
        </section>

 
 
       
 
@endsection