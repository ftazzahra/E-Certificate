@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h2 class="m-0 text-dark">E-Certificate</h2>
@stop

@section('content')

<!-- Main content -->
<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0 font-weight-bold text-primary">Edit Data Siswa</h3>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <form action="/admin/{{$adm->id}}/update" method="POST">
                                        @csrf
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach($errors->all() as $error)
                                            <li> {{$error}} </li>
                                            @endforeach
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nipd" name="nipd" placeholder="Nomor Induk Peserta Didik" value="{{ $adm -> nipd}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="{{ $adm -> nama}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $adm -> email}}">
                                        </div>
                                
                                        <div class="form-group">
                                            <select name="kelas" id="kelas" class="custom-select rounded" value="{{ $adm -> kelas}}">
                                                <option selected="">Kelas</option>
                                                <option value="X" @if($adm->kelas=='X') selected @endif>X</option>
                                                <option value="XI" @if($adm->kelas=='XI') selected @endif>XI</option>
                                                <option value="XII" @if($adm->kelas=='XII') selected @endif>XII</option>
                                                <option value="XIII" @if($adm->kelas=='XIII') selected @endif>XIII</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="kejuruan" id="jurusan" class="custom-select rounded" value="{{ $adm -> kejuruan}}">
                                                <option selected="jurusan">Program Keahlian</option>
                                                <option value="Teknik Industri KetenagaListrikan" @if($adm->kejuruan=='TITL') selected @endif>Teknik Industri KetenagaListrikan</option>
                                                <option value="Teknik Elektronika" @if($adm->kejuruan=='TE') selected @endif>Teknik Elektronika</option>
                                                <option value="Rekayasa Perangkat Lunak" @if($adm->kejuruan=='RPL') selected @endif>Rekayasa Perangkat Lunak</option>
                                                <option value="Teknik Jaringan Komputer" @if($adm->kejuruan=='TJKT') selected @endif>Teknik Jaringan Komputer</option>
                                                <option value="Desain Komunikasi Visual" @if($adm->kejuruan=='DKV') selected @endif>Desain Komunikasi Visual</option>
                                                <option value="Mekatronika" @if($adm->kejuruan=='MEKA') selected @endif>Mekatronika</option>
                                                <option value="Teknik Ototronika" @if($adm->kejuruan=='TO') selected @endif>Teknik Ototronika</option>
                                                <option value="Busana Butik" @if($adm->kejuruan=='BB') selected @endif>Busana Butik</option>
                                                <option value="Broadcasting Perfilman" @if($adm->kejuruan=='BP') selected @endif>Broadcasting Perfilman</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $adm -> alamat}}">
                                        </div>
                                        <div class="form-group">
                                            <select name="event" id="event" class="custom-select rounded" value="{{$adm->namaEv}}">
                                                @foreach ($events as $event)
                                                <option value="{{$event -> id}}" {{$event->namaEv ? 'selected' : '' }}>{{$event->namaEv}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="dudi" name="dudi" placeholder="Nama Dudi" value="{{ $adm -> dudi}}">
                                        </div>
                                        <div class="form-group">
                                            <select name="status" id="status" class="custom-select rounded" value="{{ $adm -> status}}">
                                                <option selected="">Status</option>
                                                <option value="pemenang" @if($adm->status=='pemenang') selected @endif>Pemenang</option>
                                                <option value="peserta" @if($adm->status=='peserta') selected @endif>Peserta</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-outline-primary float-sm-right mt-3 pt-1 pb-1">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>

@stop