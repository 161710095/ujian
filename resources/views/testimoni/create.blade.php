@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<h1><center><div class="panel-heading">Tambah Data Testimoni</center></h1> 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  <div class="panel-body">
			  	<form action="{{ route('testimoni.store') }}" method="post" enctype="multipart/form-data" >
					  {{ csrf_field() }}
					  
					  <div class="form-group {{ $errors->has('gambar') ? ' has-error' : '' }}">
			  			<label class="control-label">Gambar</label>	
			  			<input type="file" name="gambar" class="form-control"  required>
			  			@if ($errors->has('gambar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gambar') }}</strong>
                            </span>

                        @endif
			  		</div>
			  		
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama</label>	
			  			<textarea id="text" type="ckeditor" name="nama" class="ckeditor"required>
			  			</textarea>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                             @endif
			  		</div>
			  		
			  		<div class="form-group {{ $errors->has('testi') ? ' has-error' : '' }}">
			  			<label class="control-label">Testi</label>	
			  			<textarea id="text" type="ckeditor" name="testi" class="ckeditor"required>
			  			</textarea>
			  			@if ($errors->has('testi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('testi') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
			  	
</div>
@endsection




