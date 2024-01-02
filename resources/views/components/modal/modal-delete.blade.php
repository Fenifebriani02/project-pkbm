
<div class="modal fade" id="{{ $id ?? '' }}" tabindex="-1" aria-labelledby="{{ $id ?? '' }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{ $action ?? '' }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body  d-flex flex-column align-items-center justify-content-center">
                  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal-delete">
                                <i class="mdi mdi-alert-circle icons"></i>
                                <h1 class="modal-title fs-5" id="{{ $id ?? '' }}">Yakin ingin menghapus data ini ?!</h1>
                                <p>Data yang telah dihapus tidak bisa dikembalikan lagi !</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">BATAL</button>
                                <button type="submit" class="btn btn-outline-danger">TETAP HAPUS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
           
        </div>
    </div>
</div>
