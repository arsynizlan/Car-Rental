<form id="updateForm">
    <div class="modal fade" id="updateModal"tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalTitle">Buat Riwayat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="car" class="form-label">Mobil</label>
                            <select id="car_id-update" name="car" class="form-select">
                                <option value="" selected disabled>PIlih Mobil</option>
                                @foreach ($cars as $id => $item)
                                    <option value="{{ $id }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="date" class="form-label">Tanggal Service</label>
                            <input type="date" id="date-update" name="date" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" id="description-update" name="description" class="form-control"
                                placeholder="Masukan Deskripsi " />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" id="updateSubmit">Sunting</button>
                </div>
            </div>
        </div>
    </div>
</form>
