<form id="createForm">
    <div class="modal fade" id="createModal"tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalTitle">Tambah Mobil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Nama Mobil</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Nama Mobil " />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="type" class="form-label">type</label>
                            <select id="type" name="type" class="form-select">
                                <option value="" selected disabled>Jenis Mobil</option>
                                <option value="Angkutan Orang">Angkutan Orang</option>
                                <option value="Angkutan Barang">Angkutan Barang</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="lisence_plate" class="form-label">Plat Nomor</label>
                            <input type="text" id="lisence_plate" name="lisence_plate" class="form-control"
                                placeholder="Plat Nomor Mobil" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="owner" class="form-label">Kepemilikan</label>
                            <select id="owner" name="owner" class="form-select">
                                <option value="" selected disabled>Kepemilikan</option>
                                <option value="Milik Perusahaan">Milik Perusahaan</option>
                                <option value="Sewaan">Sewaan</option>
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
