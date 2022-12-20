<form id="updateForm">
    <div class="modal fade" id="updateModal"tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalTitle">Permintaan Persetujuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="driver_name" class="form-label">Nama Driver</label>
                            <input type="text" id="driver_name-update" name="driver_name" class="form-control"
                                placeholder="Nama Driver " readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="Mobil" class="form-label">Mobil</label>
                            <select disabled id="car_id-update" name="car_id" readonly class="form-select">
                                <option value="" selected disabled>PIlih Mobil</option>
                                @foreach ($cars as $id => $item)
                                    <option value="{{ $id }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="date_from" class="form-label">Tanggal Pinjam</label>
                            <input type="date" id="date_from-update" name="date_from" class="form-control"
                                readonly />
                        </div>
                        <div class="col mb-0">
                            <label for="date_to" class="form-label">Tanggal Kembali</label>
                            <input type="date" id="date_to-update" name="date_to" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="user_id-update" class="form-label">Penanggung Jawab</label>
                            <select disabled id="user_id-update" name="responsible_person" class="form-select">
                                <option value="" selected disabled>Pilih Penanggung Jawab</option>
                                @foreach ($responsible_person as $id => $item)
                                    <option value="{{ $id }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status-update" name="status" class="form-select">
                                {{-- <option value="" selected disabled>Pilih status persetujuan</option> --}}
                                <option value="2" selected disabled>Menunggu Persetujuan</option>
                                <option value="3">Ditolak</option>
                                <option value="4">Disetujui</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" id="updateSubmit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
