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
                                   
<form method="POST" action="{{url('pengelola/calon-bem/edit')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="idcalonbem" value="{{$edit->idcalonbem}}"> 
    <div class="form-group row mt-4">
      <label class="col-md-2" >Nama Pasangan</label>
      <div class="col-md-6">
      <input type="text" class="form-control" name="calon_namapasangan" value="{{$edit->calon_namapasangan}}" required>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Slogan Pasangan</label>
      <div class="col-md-6">
      <input type="text" class="form-control" name="calon_slogan" value="{{$edit->calon_slogan}}" required>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Nomor Urut Pasangan</label>
      <div class="col-md-6">
      <input type="number" min="1" max="10" class="form-control" name="calon_nourut" value="{{$edit->calon_nourut}}" required>
      </div>
    </div>
    <hr>
<div class="row">
<div class="col-md-6">
  <h4>Data Ketua</h4>
  <div class="form-group row mt-4">
    <label class="col-md-4" >NPM Ketua</label>
    <div class="col-md-8">
    <input type="text" class="form-control" name="calon_npmketua" value="{{$edit->calon_npmketua}}" required>
    </div>
  </div>
  <div class="form-group row mt-4">
    <label class="col-md-4" >Nama Ketua</label>
    <div class="col-md-8">
    <input type="text" class="form-control" name="calon_namaketua" value="{{$edit->calon_namaketua}}" required>
    </div>
  </div> 
  <div class="form-group row mt-4">
    <label class="col-md-4" >Angkatan Ketua</label>
    <div class="col-md-8"> 
  <select class="form-control" name="calon_angkatanketua">
    <option value="{{$edit->calon_angkatanketua}}" selected>-- {{$edit->angkatan_nama}}-- </option>
    @foreach($angkatan as $a)
    <option value="{{$a->idangkatan}}">{{$a->angkatan_tahun}} / {{$a->angkatan_nama}}</option> 
    @endforeach
  </select>
    </div>
  </div>    
</div>
<div class="col-md-6">
  <h4>Data Wakil Ketua</h4>
  <div class="form-group row mt-4">
    <label class="col-md-4" >NPM Wakil Ketua</label>
    <div class="col-md-8">
    <input type="text" class="form-control" name="calon_npmwakil" value="{{$edit->calon_npmwakil}}" required>
    </div>
  </div>
  <div class="form-group row mt-4">
    <label class="col-md-4" >Nama Wakil Ketua</label>
    <div class="col-md-8">
    <input type="text" class="form-control" name="calon_namawakil" value="{{$edit->calon_namawakil}}" required>
    </div>
  </div> 
  <div class="form-group row mt-4">
    <label class="col-md-4" >Angkatan Wakil Ketua</label>
    <div class="col-md-8"> 
  <select class="form-control" name="calon_angkatanwakil">
    <option value="{{$edit->calon_angkatanwakil}}" selected>-- {{$edit->angkatan_nama}}-- </option>
    @foreach($angkatan as $a)
    <option value="{{$a->idangkatan}}">{{$a->angkatan_tahun}} / {{$a->angkatan_nama}}</option> 
    @endforeach
  </select>
    </div>
  </div>   
</div>
</div>

<hr>
    <h4>Biografi Pasangan</h4>
<div class="form-group row mt-4">
  <div class="col-md-12">
    <textarea name="calon_biografi" class="form-control my-editor" rows="10">{!! $edit->calon_biografi !!}</textarea>
  </div>
</div>
<hr>

<h4>Program Kerja & Visi Misi</h4>
<div class="form-group row mt-4">
  <div class="col-md-12">
    <textarea name="calon_prokervisimisi" class="form-control my-editor" rows="10">{!! $edit->calon_biografi !!}</textarea>
  </div>
</div>

<hr>
<h4>Foto Pasangan Calon</h4>
<div class="form-group row">
  <label class="col-md-2 text-md-right">Profil Picture</label>

  <div class="col-md-8">
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