@extends('adminlte::page')

@section('title', 'Sertifikat')

<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>
<style>
    
</style>


@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">Selamat Datang di e-sertifikat SMK nesaba!!</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">You are logged in!</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$totalData}}</h3>

                    <p>Total Data Sertifikat</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$template}}<sup style="font-size: 20px"></sup></h3>

                    <p>Total Template</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title judul">Event SMK Nesaba</h3>
                    

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <a href="#">
                            <button type="button" class="btn btn-tool tambah" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </a>
                        
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Event</th>
                                    <th>Status</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                                @forelse ($events as $event)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime ($event->tanggalEv)) }}</td>
                                    <td>{{ $event->namaEv }}</td>
                                    <td>{{ $event->statusEv }}</td>
                                    <td style="font-size: 15px; width:150px;" class="text-center">
                                        <a href="#">
                                            <button type="button" class="btn btn-tool edit" data-toggle="modal" data-target="#exampleModal2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>| 
                                        <a href="{{route ('hapusE', $event->id) }}"><i class="fas fa-solid fa-trash" style="color: firebrick;" onclick="return confirm('ingin menghapus data ({{$event->namaEv}}) ?')"></i></a> |
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </thead>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
    </div>
</div>
@include('admin.event')
@include('admin.edit-event')
@stop