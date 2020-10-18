@extends('layouts.admin')
@section('title', 'Ubah Pasangan Calon - ')
@section('content') 
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Ubah Pasangan Calon</h4>
                            </div>
                            <div class="col-sm-8 col-xl-6">
                               <a href="{{url('pengelola/calon-bem')}}" class="btn btn-md btn-primary text-white float-right">Kembali</a> 
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-3"> 
                                    <h4 class="header-title mt-0 mb-1">Ubah Pasangan {{$edit->calon_namapasangan}}</h4> 
                                   
<form method="POST" action="{{url('pengelola/calon-bpm/edit')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="idcalonbpm" value="{{$edit->idcalonbpm}}">
    <div class="form-group row mt-4">
      <label class="col-md-2" >Nomor Urut Calon</label>
      <div class="col-md-4">
      <input type="number" min="1" max="10" class="form-control" name="calon_nourut" value="{{$edit->calon_nourut}}" required>
      </div>
    </div>
    <hr>
<div class="row">
<div class="col-md-12">
  <h4>Data Calon</h4>
  <div class="form-group row mt-4">
    <label class="col-md-4" >NPM Calon</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="calon_npmcalon" value="{{$edit->calon_npmcalon}}" required>
    </div>
  </div>
  <div class="form-group row mt-4">
    <label class="col-md-4" >Nama Calon</label>
    <div class="col-md-6">
    <input type="text" class="form-control" name="calon_namacalon" value="{{$edit->calon_namacalon}}" required>
    </div>
  </div> 
  <div class="form-group row mt-4">
    <label class="col-md-4" >Angkatan Calon</label>
    <div class="col-md-6"> 
  <select class="form-control" name="calon_angkatancalon">
    <option value="{{$edit->calon_angkatancalon}}" selected>-- {{$edit->angkatan_nama}}-- </option>
    @foreach($angkatan as $a)
    <option value="{{$a->idangkatan}}">{{$a->angkatan_tahun}} / {{$a->angkatan_nama}}</option> 
    @endforeach
  </select>
    </div>
  </div>    
</div> 
</div>

<hr>
    <h4>Biografi</h4>
<div class="form-group row mt-4">
  <div class="col-md-12">
    <textarea name="calon_biografi" class="form-control my-editor" rows="10"> {!! $edit->calon_biografi !!}</textarea>
  </div>
</div>
<hr>

<h4>Program Kerja & Visi Misi</h4>
<div class="form-group row mt-4">
  <div class="col-md-12">
    <textarea name="calon_prokervisimisi" class="form-control my-editor" rows="10"> {!! $edit->calon_prokervisimisi !!}</textarea>
  </div>
</div>

<hr>
<h4>Foto Calon BPM</h4>
<div class="form-group row">
  <label class="col-md-2 text-md-right">Profil Picture</label>

  <div class="col-md-6">
  <img src="{{asset($edit->calon_pasfoto)}}" id="fotocalon" style="width:400px;height:200px;" class="img-fluid" />
<br>
<input type="file" id="inputfotocalon" name="fotosuratsuara" class="validate" >
  </div>
</div>
<div class="form-group row mt-4">
  <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Ubah Calon</button>
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

<script src="{{asset('adminasset/libs/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{asset('adminasset/libs/tinymce/tinymce.min.js')}}"></script>
<script>  
                        var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
 
      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }
 
      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };
 
  tinymce.init(editor_config);

  
var fotocalon = $("#inputfotocalon");
function readURL(fotocalon) {
            if (fotocalon.files && fotocalon.files[0]) {
                var reader = new FileReader();
          
                reader.onload = function (e) {
                    $('#fotocalon').attr('src', e.target.result);
                }
          
                reader.readAsDataURL(fotocalon.files[0]);
            }
          }
          
          $("#inputfotocalon").change(function () {
            readURL(this);
          }); 
          
                        </script>
@endsection

                        @endsection