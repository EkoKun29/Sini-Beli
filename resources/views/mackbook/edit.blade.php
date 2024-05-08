<div class="modal modal-blur fade" id="modal-edit-{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('beli-mackbook.update', $d->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <script>
                        var hargaBarang = {
                            "MackBook Air M1" :15000000,
                            "MackBook Air M2" :18000000,
                            "MackBook Air Pro"  :20000000,
                            "MackBook Pro"  :19000000,
                            "MackBook Pro M2" :20000000
                        };

                        function updateHarga() {
                            var select = document.getElementById("nama");
                            var hargaInput = document.getElementById("harga");
                            var selectedOption = select.options[select.selectedIndex];
                            var namaBarang = selectedOption.value;
                            var harga = hargaBarang[namaBarang];

                            hargaInput.value = harga;
                        }

                        // Tambahkan event listener ke elemen select saat modal ditampilkan
                        document.getElementById("modal-edit-{{ $d->id }}").addEventListener('shown.bs.modal', function () {
                            updateHarga();
                        });
                    </script>
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <select name="nama" class="form-control" id="nama" onchange="updateHarga()">
                            <option disabled selected>Pilih Barang</option>
                            <option value="MackBook Air M1">MackBook Air M1</option>
                            <option value="MackBook Air M2">MackBook Air M2</option>
                            <option value="MackBook Air Pro">MackBook Air Pro</option>
                            <option value="MackBook Pro">MackBook Pro</option>
                            <option value="MackBook Pro M2">MackBook Pro M2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" placeholder="harga" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Qty</label>
                        <input type="number" name="qty" class="form-control" id="qty" placeholder="qty" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger ms-auto">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
