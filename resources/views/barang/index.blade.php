@extends('layouts.admin')
@section('content')
 <section id="main-content">
      <section class="wrapper">
<div class="limiter">
	<div class="container-login100">
		<div class="col-md-12">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		@include('sweet::alert')
			<div class="panel panel-primary">
			<h1><center><div class="panel-heading">Daftar Barang Yang Tersedia</center></h1> 
			 <div class="panel-title pull-right"><a href="{{ route('barang.create') }}"><i class="fa fa-plus"></i>Tambah</a>
                  </div>
			  
			  <div class="panel-body">
			  	 <table class="table">
				  	<thead>
			  		<tr>
		  		  <th>No</th>
					  <th>Gambar</th>
					  <th>Merk</th>
					  <th>Model</th>
					  <th colspan="3">Aksi</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($b as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
						<td><p><a href ="" class="thumbnail">
				    	<img src="{{asset('/gambar/barang/'.$data->gambar.'')}}" width="70" height="70"></td>
				    	<td><p>{!! $data->merk !!}</p></td>
						<td><p>{!! $data->model !!}</p></td>
						<td>
							<a class="btn btn-warning"   href="{{ route('barang.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<form method="post" action="{{ route('barang.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE" >

                        <button onclick="return confirm('Yakin ingin menghapus Data?')"class="btn btn-danger btn-outline js-submit-confirm" type="submit">Delete</button>
							</form>
						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
</section>
</section>
@endsection