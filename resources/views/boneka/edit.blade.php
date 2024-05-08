<div class="modal modal-blur fade" id="modal-edit-{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('beli-boneka.update', $d->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <script>
                        var hargaBarang = {
                            "Boneka teddy bear Import Springs Edition" : 370000,
                            "Boneka teddy bear jumbo ukuran 1 meter"    : 155000,
                            "Boneka Mini Teddy Bear Ukuran 15 cm"   : 75000,
                            "Boneka Teddy Bear Import ukuran 70 cm" : 165000
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
                           <option value="Boneka teddy bear Import Springs Edition">Boneka teddy bear Import Springs Edition</option>
                            <option value="Boneka teddy bear jumbo ukuran 1 meter">Boneka teddy bear jumbo ukuran 1 meter</option>
                            <option value="Boneka Mini Teddy Bear Ukuran 15 cm">Boneka Mini Teddy Bear Ukuran 15 cm</option>
                            <option value="Boneka Teddy Bear Import ukuran 70 cm">Boneka Teddy Bear Import ukuran 70 cm</option>
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
