<!-- Button trigger modal -->


<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Event SMK Nesaba</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route ('updateE', $event->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field()}}

                    <div class="mb-3">
                        <label for="tanggalEv" class="col-form-label">Tanggal Event:</label>
                        <input type="date" class="form-control" id="tanggalEv" name="tanggalEv" value="{{ $event -> tanggalEv}}">
                    </div>
                    <div class="mb-3">
                        <label for="namaEv" class="col-form-label">Nama Event:</label>
                        <input type="text" class="form-control" id="namaEv" name="namaEv" value="{{ $event -> namaEv}}">
                    </div>
                    <div class="mb-3">
                        <label for="statusEv" class="col-form-label">Status Event:</label>
                        <select name="statusEv" id="statusEv" class="custom-select rounded" value="{{$event->status}}">
                            <option selected="">Status</option>
                            <option value="prosesEvent">proses event</option>
                            <option value="belum">belum</option>
                            <option value="selesai">selesai</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->