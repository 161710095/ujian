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
        <li class="breadcrumb-item"><a href="{{route('artikel.index')}}">Artikel</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Artikel</a></li>
    </ol>
</nav>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">Tambah Artikel</h5>
        <form action="{{ route('artikel.update',$a->id) }}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" value="{{$a->judul}}" name="judul" class="form-control" placeholder="Masukan Judul" required>
                </div> 
                <div class="form-group">
                    <label>Isi</label>
                    <input type="text" value="{{$a->isi}}" name="isi" class="form-control" placeholder="Masukan Isi" required>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    @if (isset($a) && $a->gambar)
                        <p>
                        <br>
                        <img src="{{asset('/gambar/artikel/'.$a->gambar.'')}}" style="width:250px; height:250px;" alt="">
                        </p>
                    @endif
                    <input name="gambar" type="file" value="{{$a->gambar}}">
                </div>   
            </div>
            <div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
        </form>
    </div>
</div>
@endsection