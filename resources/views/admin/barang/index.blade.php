@extends('layouts.admin')
@section('css')

@endsection
@section('js')
<script src="{{asset('/assets/js/components/datatables-init.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('header')
<nav class="breadcrumb-wrapper" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin')}}"><i class="icon dripicons-home"></i></a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Barang</a></li>
    </ol>
</nav>
@endsection
@section('content')
<div class="col-12">
     <center>
        <a href="{{ route('admin.barang.create') }}" class="btn btn-primary btn-rounded btn-floating btn-outline">
            Tambah Data
        </a>
    </center><br><br>
    <div class="card">
        <h5 class="card-header">
        Barang
        </h5>
        <div class="card-body">
            <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Kategori</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php $no =1; @endphp
                @foreach($barang as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td><p><a href ="" class="thumbnail">
				    	<img src="{{asset('/gambar/barang/'.$data->gambar.'')}}" width="70" height="70"></td>
                    <td>{{$data->merk}}</td>
                    <td>{{$data->model}}</td>
                    <td>{{ $data->kategori->nama_kategori }}</td>
                    <td>{{ $data->slug }}</td>
                    <td>
                        @role('admin')
                        @if($data->status == 1)
                            <form action="{{ route('admin.barang.publish',$data->id) }}" method="post">
                            @csrf
                            <button class="btn btn-secondary btn-outline">Aktif</button>
                            </form>
                        @elseif($data->publish == 0)
                            <form action="{{ route('admin.barang.publish',$data->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-outline">Non Aktif</button>
                            </form>
                        @endif
                        @endrole
                        @role('member')
                        @if($data->status == 1)
                            Aktif
                        @elseif($data->publish == 0)
                            Non Aktif
                        @endif
                        @endrole
                    </td>
                    <td>
                        <form method="post" action="{{ route('admin.barang.destroy',$data->id) }}">
						<a href="{{ route('admin.barang.edit',$data->id) }}" class="btn btn-warning btn-outline">Edit</a>
                        		<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">
                        <button onclick="return confirm('Yakin ingin menghapus Data?')"class="btn btn-danger btn-outline js-submit-confirm" type="submit">Delete</button>
                        </form>
                    </td>
                    @include('sweet::alert')
                </tr>
                @endforeach

                </tbody>

            </table>


        </div>
    </div>
</div>
@endsection
