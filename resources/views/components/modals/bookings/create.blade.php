<form id="createForm">
    <div class="modal fade" id="createModal"tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalTitle">Buat Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="driver_name" class="form-label">Nama Driver</label>
                            <input type="text" id="driver_name" name="driver_name" class="form-control"
                                placeholder="Nama Driver " />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="Mobil" class="form-label">Mobil</label>
                            <select id="mobil" name="car_id" class="form-select">
                                <option value="" selected disabled>PIlih Mobil</option>
                                @foreach ($cars as $id => $item)
                                    <option value="{{ $id }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="loan_date" class="form-label">Tanggal Pinjam</label>
                            <input type="date" id="loan_date" name="loan_date" class="form-control" />
                        </div>
                        <div class="col mb-0">
                            <label for="returned_date" class="form-label">Tanggal Kembali</label>
                            <input type="date" id="returned_date" name="returned_date" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="responsible_person" class="form-label">Penanggung Jawab</label>
                            <select id="responsible_person" name="responsible_person" class="form-select">
                                <option value="" selected disabled>Pilih Penanggung Jawab</option>
                                @foreach ($responsible_person as $id => $item)
                                    <option value="{{ $id }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" id="createSubmit">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>
