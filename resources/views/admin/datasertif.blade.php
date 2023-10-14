@extends('adminlte::page')

@section('title', 'Data Sertifikat')

<style>
    .btn-tmb {
        background-image: linear-gradient(#395B64, #A5C9CA);
    }

    body {
        margin: 0;
        padding: 0;
        background: #19161c;
        height: 10vh;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-direction: column;
        align-content: center;
    }

    .box {
        position: relative;
    }

    .input {
        padding: 10px;
        width: 55px;
        height: 30px;
        background: none;
        border: 2px solid cadetblue;
        border-radius: 50px;
        box-sizing: border-box;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 18px;
        color: white;
        outline: none;
        transition: .5s;
    }

    .box:hover input {
        width: 378px;
        border-radius: 10px;
    }

    .box i {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translate(-80%, -50%);
        font-size: 26px;
        color: #ffd52d;
        transition: .2s;
    }

    .box:hover i {
        opacity: 0;
        z-index: -2;
    }
</style>


@section('content_header')
<h2 class="m-0 text-dark">E-Certificate</h2>
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">data sertifikat</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <form class="form-inline my-2 my-lg-0" type="get" action="{{route ('cari')}}">
                        <div class="box">
                            <input class="form-control mr-sm-2 input" name="query" type="search" placeholder="Cari data" onmouseout="this.value = ''; this.blur();">
                            <button class="btn btn-outline-Light my-2 my-sm-0" type="submit">Cari</button>
                        </div>
                    </form>

                    <!-- <div class="container">
                        <h3 align="center">Import File Excel Disini</h3>
                        <br>
                        <form action="{{route ('import')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>Upload File</label></td>
                                        <td wdith="30%">
                                            <input type="file" name="Pilih File" />
                                        </td>
                                        <td width="30%" align="left">
                                            <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="right"></td>
                                        <td width="30"><span class="text-muted">.xls, .xlsx</span></td>
                                        <td width="30%" align="left"></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div> -->


                    <div class="card-tools mb-3 mt-3">
                        <a href="{{route ('tambah-data')}}" class="btn btn-tmb btn-success">Tambah Data &nbsp; <i class="fas fa-plus-square g-2"></i></a>
                        <a href="{{route ('import')}}" class="btn btn-outline-info ms-2">Impor Data &nbsp; <i class="fas fa-solid fa-file-import"></i></a>
                        <a href="#" class="btn btn-outline-success ms-1">Download Data &nbsp; <i class="fas fa-download"></i></a>

                    </div>


                    <div id="example" class="dataTables_wrapper dt-bootstrap4">
                        <!-- <div class="col-12">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap"> <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                                    <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span></button></div>
                                </div>
                            </div>
                        </div> -->
                        <table id="sertifikat" class="table table-bordered table-striped">
                            <tr class="text-center" style="color:steelblue; background-color:aliceblue">
                                <th>No</th>
                                <th>NIPD</th>
                                <th>Nama</th>
                                <th>email</th>
                                <th>Alamat</th>
                                <th>Kelas</th>
                                <th>Program Keahlian</th>
                                <th>event</th>
                                <th>dudi</th>
                                <th>Status</th>
                                <th>Aksi</th>

                            </tr>
                            @foreach ($siswa as $item)
                            <tr style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:13px; font-weight:lighter;">
                                <td>{{ ++ $i}}</td>
                                <td>{{ $item -> nipd}}</td>
                                <td>{{ $item -> nama}}</td>
                                <td>{{ $item -> email}}</td>
                                <td>{{ $item -> alamat}}</td>
                                <td>{{ $item -> kelas}}</td>
                                <td>{{ $item -> kejuruan}}</td>
                                <td>{{ $item -> event->namaEv}}</td>
                                <td>{{ $item -> dudi}}</td>
                                <td>{{ $item -> status}}</td>
                                <td style="font-size: 15px; width:150px;" class="text-center">
                                    <a href="{{route ('edit', $item->id) }}"><i class="fas fa-edit"></i></a> |
                                    <a href="{{route ('hapus', $item->id) }}"><i class="fas fa-solid fa-trash" style="color: firebrick;" onclick="return confirm('ingin menghapus data ({{$item->nama}}) ?')"></i></a> |
                                    <a href="{{route('siswa.sertifikat',$item->id)}}" target="_blank"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#sertifikat').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'ExampleFile'
                },
                {
                    extend: 'pdf',
                    title: 'ExampleFile'
                },

                {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');

                    }
                }

            ]
        });

    });
</script>
@include('sweetalert::alert')
@stop