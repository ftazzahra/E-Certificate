@extends('adminlte::page')

@section('title', 'Sertifikat')
<style>
    .btn-tmb {
        background-image: linear-gradient(#205E61, #3F979B, #8BF5FA);
    }
</style>

@section('content_header')
<h2 class="m-0 text-dark">E-Certificate</h2>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form class="form-inline my-2 my-lg-0" type="get" action="{{route ('search')}}">
            <div class="box">
                <input class="form-control mr-sm-2 input" name="quer" type="search" placeholder="Cari data" onmouseout="this.value = ''; this.blur();">
                <button class="btn btn-outline-Light my-2 my-sm-0" type="submit">Cari</button>
            </div>
        </form>
        <div class="card-tools mb-3 mt-3">
            <a href="{{route ('tambahtplt')}}" class="btn btn-info">Tambah Data &nbsp; <i class="fas fa-plus-square g-2"></i></a>
            <a href="#" class="btn btn-outline-info ms-2">Impor Data &nbsp; <i class="fas fa-download"></i></a>
            <a href="{{route ('lihat')}}" class="btn btn-outline-success ms-1">Template &nbsp; <i class="fas fa-image"></i></a>
            <a href="{{route ('lihatT')}}" class="btn btn-outline-success ms-1">Template2 &nbsp; <i class="fas fa-image"></i></a>
        </div>

    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif


    <table class="table table-bordered">
        <thead>
            <tr class="text-center" style="color:steelblue;">
                <th>No</th>
                <th>Tanggal</th>
                <th>Template</th>
                <th>Status</th>
                <th>Nama Template</th>
                <th>Opsi</th>
            </tr>
        </thead>
        @foreach ($templates as $template)
        <tbody>
            <tr class="text-center">
                <td style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:13px; font-weight:lighter; width:50px;">{{ ++ $i}}</td>
                <td style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:13px; font-weight:lighter;">{{date('d-m-Y', strtotime ($template -> tanggal))}}</td>
                <td><img src="/images/{{ $template->image}}" alt="" width="100px" height="100px"></td>
                <td style="width:150px;" class="text-center">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="options" id="option_a1" autocomplete="off" @checked($template->status == 'default')> Default
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option_a2" autocomplete="off" @checked($template->status == 'non-default')> Non
                        </label>
                    </div>
                </td>
                <td style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:13px; font-weight:lighter;">{{ $template->namatplt}}</td>
                <td style="font-size: 15px;" class="text-center">
                    <a href="{{route ('editT', $template->id) }}"><i class="fas fa-edit"></i></a>|
                    <a href="{{route ('hapusT', $template->id) }}"><i class="fas fa-solid fa-trash" style="color: firebrick;" onclick="return confirm('ingin menghapus data ({{$template->namatplt}}) ?')"></i></a> |
                </td>
            </tr>
        </tbody>
        @endforeach

    </table>

</div>
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
@include('sweetalert::alert')

{{!! $templates->links() !!}}

@stop