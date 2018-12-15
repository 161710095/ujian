@extends('layouts.admin')
@section('js')
<script src="{{ asset('assets/tinymce/js/tinymce/tinymce.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
  selector: 'textarea',
  height: 300,
  theme: 'modern',
  plugins: 'print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount   imagetools  contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
 
</script>
@endsection
@section('header')
<nav class="breadcrumb-wrapper" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="icon dripicons-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{route('testimoni.index')}}">Testimoni</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Testimoni</a></li>
    </ol>
</nav>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">Tambah Testimoni</h5>
        <form action="{{ route('testimoni.update',$testi->id) }}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" value="{{$testi->nama}}" name="nama" class="form-control" placeholder="Masukan Nama" required>
                </div> 
                <div class="form-group">
                    <label>Testi</label>
                    <input type="text" value="{{$testi->testi}}" name="testi" class="form-control" placeholder="Masukan Testi" required>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    @if (isset($testi) && $testi->gambar)
                        <p>
                        <br>
                        <img src="{{asset('/gambar/testi/'.$testi->gambar.'')}}" style="width:250px; height:250px;" alt="">
                        </p>
                    @endif
                    <input name="gambar" type="file" value="{{$testi->gambar}}">
                </div>   
            </div>
            <div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
        </form>
    </div>
</div>
@endsection