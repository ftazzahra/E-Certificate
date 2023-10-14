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
                        <h3 class="card-title m-0 font-weight-bold text-primary">Tambahkan Data Siswa</h3>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <form action="/admin/simpan-data" method="post">
                                        {{ csrf_field()}}
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nipd" name="nipd" placeholder="Nomor Induk Peserta Didik">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <select name="kelas" id="kelas" class="custom-select rounded">
                                                <option selected="kelas">Kelas</option>
                                                <option value="X">X</option>
                                                <option value="XI">XI</option>
                                                <option value="XII">XII</option>
                                                <option value="XIII">XIII</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="kejuruan" id="kejuruan" class="custom-select rounded">
                                                <option selected="kejuruan">Program Keahlian</option>
                                                <option value="Teknik Industri KetenagaListrikan">Teknik Industri KetenagaListrikan</option>
                                                <option value="Teknik Elektronika<">Teknik Elektronika</option>
                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                <option value="Teknik Jaringan Komputer">Teknik Jaringan Komputer</option>
                                                <option value="Desain Komunikasi Visual<">Desain Komunikasi Visual</option>
                                                <option value="Mekatronika">Teknik Mekatronika</option>
                                                <option value="Teknik Ototronika">Teknik Ototronika</option>
                                                <option value="Busana Butik">Busana Butik</option>
                                                <option value="Broadcasting Perfilman">Broadcasting Perfilman</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                        </div>
                                        <div class="form-group">
                                            <select name="event2" id="event" class="custom-select rounded">
                                                @foreach ($events as $event)
                                                <option value="{{$event -> id}}">{{$event->namaEv}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="dudi" name="dudi" placeholder="Nama Dudi">
                                        </div>
                                        <div class="form-group">
                                            <select name="status" id="status" class="custom-select rounded">
                                                <option selected="status">Status</option>
                                                <option value="pemenang">Pemenang</option>
                                                <option value="peserta">Peserta</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-outline-primary float-sm-right mt-3 pt-1 pb-1">Simpan</button>
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