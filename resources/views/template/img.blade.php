@extends('adminlte::page')

@section('title', 'Data Sertifikat')
<style>
    .image {
        width: 100%;
    }
</style>

@section('content')
<div class="position-relative">
    <img src="https://1.bp.blogspot.com/-RXWB0Wc8Fpo/XWoFvGw7eMI/AAAAAAAAEbI/NK30A7wt_d0Go7kLzbXgWSOQeNoZBVevQCEwYBhgL/s1600/Sertifikat%2Bseminar%2B2.jpg" class="image" alt="" srcset="">
    <img src=' {{asset("img/logo.png")}} ' class="position-absolute top-0 start-0" style="width:14rem; transform: translate(36%,25%)" alt="">
    <h2 class="position-absolute top-50 start-30" style="transform: translate(300%,-220%)">Nama Peserta</h2>
</div>
@stop