<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <style>

    </style>
</head>

<body>
    <div class="sertifikat" id="sertifikat">
        <img src=' {{asset("img/template22.png")}}' class="image">
        @isset($siswa)
        <h4 class="nipd" id="nipdS">NIPD {{ $siswa->nipd }}</h4>
        <h4 class="nama" id="nameS">{{ $siswa->nama }}</h4>
        <h6 id="ket1">Telah berpartisipasi menjadi PESERTA dalam kegiatan</h6>
        <h4 class="event" id="eventS">{{ $siswa->event->namaEv }}</h4>
        <h6 id="ket2">yang diselenggarakan oleh SMKN 1 BANGIL pada</h6>
        <h4 class="kejuruan" id="kejuruanS">{{ $siswa->kejuruan }}</h4>
        <h4 class="tanggal" id="tanggalS">{{ date('d-m-Y', strtotime ($siswa->event->tanggalEv)) }}</h4>
        <h4 class="barcode" id="barcodeS">
            <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100" alt="" title="HELLO" width="50" height="50" />
        </h4>
        <h4 class="dudi" id="dudiS">{{ $siswa->dudi}}</h4>
        @else
        <h4 class="nama">Nama</h4>
        <h4 class="event">Event</h4>
        <h4 class="tanggal">hari, Tanggal, tahun</h4>
        <h4 class="barcode">"barcode"</h4>
        <h4 class="dudi">dudi</h4>
        @endif
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

</body>

</html>