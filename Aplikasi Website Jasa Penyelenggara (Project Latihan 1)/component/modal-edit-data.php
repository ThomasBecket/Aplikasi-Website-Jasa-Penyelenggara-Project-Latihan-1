<!-- Pop-up modal Edit Data -->
<div id="modalEditData" class="modal">

    <div class="modal-content">

        <div class="modal-header">

            <span class="close" id="closeEditData">&times;</span>
            <h2 style="margin-left: 15px;">Edit Product</h2>

        </div>

        <div class="modal-body">

            <form method="POST" enctype="multipart/form-data" action="">

                <input type="hidden" id="edit-produk" name="edit-id-produk">

                <label for="edit-jenis-produk">Jenis Produk:</label>
                <br />
                <input size="80" type="text" id="edit-jenis-produk" name="edit-jenis-produk" required>
                
                <br />
                <br />

                <label for="edit-deskripsi" style="display: block; margin-bottom: 8px;">Deskripsi:</label>
                <textarea rows="10" cols="80" type="text" id="edit-deskripsi" name="edit-deskripsi" required></textarea>
                
                <br />
                <br />

                <label for="edit-gambar">Gambar:</label>
                <input type="file" id="edit-gambar" name="edit-gambar">
                
                <br />
                <br />
                <br />
                <br />

                <button type="submit" name="edit-produk" style="background-color: #9830b0; color: white; border: none; padding: 10px 25px; cursor: pointer; height: 50px; width: 100px; font-size: 20px;"><b>EDIT</b></button>
            </form>

        </div>

    </div>

</div>
