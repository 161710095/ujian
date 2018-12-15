@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<h1><center><div class="panel-heading"> Ubah Data Barang</center></h1>
			  <div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  <div class="panel-body">
			  	<form action="{{ route('barang.update',$b->id) }}" method="post" enctype="multipart/form-data">
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		
			  		<div class="form-group {{ $errors->has('gambar') ? ' has-error' : '' }}">
			  			<label class="control-label">Cover</label>	
			  			<input type="file"  name="gambar" class="form-control" value="{{ $b->gambar }}"  required>
			  			@if ($errors->has('gambar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gambar') }}</strong>
                            </span>
                       @endif
			  		</div>
			  		
			  		<div class="form-group {{ $errors->has('merk') ? ' has-error' : '' }}">
			  			<label class="control-label">Merk</label>	
			  			<textarea id="text" type="ckeditor" name="merk" class="ckeditor"required>
			  			</textarea>
			  			@if ($errors->has('merk'))
                            <span class="help-block">
                                <strong>{{ $errors->first('merk') }}</strong>
                            </span>
                             @endif
			  		</div>

					<div class="form-group {{ $errors->has('model') ? ' has-error' : '' }}">
			  			<label class="control-label">Model</label>	
			  			<textarea id="text" type="ckeditor" name="model" class="ckeditor"required>
			  			</textarea>
			  			@if ($errors->has('model'))
                            <span class="help-block">
                                <strong>{{ $errors->first('model') }}</strong>
                            </span>
                             @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
</div>
@endsection