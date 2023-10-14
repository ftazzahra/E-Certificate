@extends('adminlte::page')

@section('title', 'Admin | edit')

@section('content_header')
<h2 class="m-0 text-dark">E-Certificate</h2>
@stop

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

<form action="/admin/{{$template->id}}/updateTemplate" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="card-body">
        <div class="form-group">
            <label for="tanggalInput">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal inputan" value="{{ $template -> tanggal}}">
        </div>
        <div class="form-group">
            <strong>Image :</strong>
            <input type="file" class="form-control" name="image" placeholder="masukan gambar" style="height: fit-content;">
            <img src="/images/{{ $template->image}}" alt="" width="100px" height="100px">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Status</label>
            <select name="status" id="status" class="custom-select rounded" value="{{ $template -> status}}">
                <option selected="status">Status</option>
                <option value="Default" @if($template->status=='Default') selected @endif>Default</option>
                <option value="NonDefault" @if($template->status=='NonDefault') selected @endif>Non Default</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputName">Nama Template</label>
            <input type="text" class="form-control" id="exampleInputName" name="namatplt" placeholder="Masukan Nama Template" value="{{ $template -> namatplt}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-outline-primary float-sm-right mt-3 pt-1 pb-1">Edit</button>
        </div>
    </div>
</form>

@stop