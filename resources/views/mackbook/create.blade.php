<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('beli-mackbook.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <select name="nama" class="form-control" id="namaModal">
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
                        <input type="text" name="harga" class="form-control" id="hargaModal" placeholder="harga" required readonly>
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

<script>
    // Objek yang berisi harga barang
    var hargaBarang = {
        "MackBook Air M1" :15000000,
        "MackBook Air M2" :18000000,
        "MackBook Air Pro"  :20000000,
        "MackBook Pro"  :19000000,
         "MackBook Pro M2" :20000000
    };

    // Fungsi untuk memperbarui harga saat memilih barang di dalam modal
    function updateHargaModal() {
        var select = document.getElementById("namaModal"); // Ambil elemen select di dalam modal
        var hargaInput = document.getElementById("hargaModal"); // Ambil input harga di dalam modal
        var selectedOption = select.options[select.selectedIndex]; // Ambil opsi yang dipilih
        var namaBarang = selectedOption.value; // Ambil nilai opsi yang dipilih
        var harga = hargaBarang[namaBarang]; // Ambil harga barang sesuai dengan nama barang yang dipilih

        hargaInput.value = harga; // Set nilai input harga dengan harga yang dipilih
    }

    // Tambahkan event listener ke elemen select di dalam modal
    document.getElementById("namaModal").addEventListener("change", updateHargaModal);

    // Reset harga saat modal ditutup
    $('#modal-report').on('hidden.bs.modal', function () {
        document.getElementById("hargaModal").value = ''; // Set nilai input harga kosong saat modal ditutup
    });
</script>
