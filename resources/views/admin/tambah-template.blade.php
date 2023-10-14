@extends('adminlte::page')

@section('title', 'Admin | Tambah Template')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops</strong>Ada yang salah.<br><br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('simpan-template')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field()}}
    <div class="card-body">
        <div class="form-group">
            <label for="tanggalInput">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal inputan">
        </div>
        <div class="form-group">
            <strong>Image :</strong>
            <input type="file" class="form-control" name="image" placeholder="masukan gambar" style="height: fit-content;">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Nama Template</label>
            <input type="text" class="form-control" id="exampleInputName" name="namatplt" placeholder="Masukan Nama Template">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-outline-primary float-sm-right mt-3 pt-1 pb-1">Simpan</button>
        </div>
    </div>
</form>
@include('sweetalert::alert')


@stop