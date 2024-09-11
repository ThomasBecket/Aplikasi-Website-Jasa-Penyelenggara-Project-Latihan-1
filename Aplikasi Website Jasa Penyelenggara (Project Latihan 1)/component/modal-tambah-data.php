<!-- Pop-up modal Tambah Data -->
<div id="modalTambahData" class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <span class="close" id="closeTambahData">&times;</span>
            <h2 style="margin-left: 15px;">Add Product</h2>
            
        </div>

        <div class="modal-body">

            <form method="POST" action="" enctype="multipart/form-data">

                <label for="tambah-produk">ID:</label>
                <br />
                <input size="80" type="text" id="tambah-produk" name="tambah-produk" required>

                <br />
                <br />

                <label for="tambah-jenis-produk">Jenis Produk:</label>
                <br />
                <input size="80" type="text" id="tambah-jenis-produk" name="tambah-jenis-produk" required>

                <br />
                <br />

                <label for="tambah-deskripsi" style="display: block; margin-bottom: 8px;">Deskripsi:</label>
                <textarea rows="10" cols="80" id="tambah-deskripsi" name="tambah-deskripsi" required></textarea>

                <br />
                <br />

                <label for="tambah-gambar">Gambar:</label>
                <input type="file" id="tambah-gambar" name="tambah-gambar" accept="image/*" required>

                <br />
                <br />
                <br />
                <br />

                <button type="submit" value="Tambah Data" style="background-color: #9830b0; color: white; border: none; padding: 10px 25px; cursor: pointer; height: 50px; width: 150px; font-size: 20px;"><b>TAMBAH</b></button>

            </form>

        </div>
    
    </div>

</div>
