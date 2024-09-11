<?php

include 'backend/fungsi.php';
include 'backend/login.php';

//Fungsi untuk memulai Session
session_start();

if (!Session::get('id_user')) {
    header("Location: index.php");
    exit();
}

//Fungsi untuk end Session
if (isset($_POST['logout'])) {
    Session::destroy();
    header("Location: index.php");
    exit();
}

// Fungsi keyword untuk mencari data
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Fungsi untuk mengambil data dan sekalian dengan fungsi mengambil data saat memasukkan keyword untuk mencari data
if (!empty($keyword)) {
    $data = $produk->ambilDataJasaPenyelenggara($produk->cariDataJasaPenyelenggara($keyword));
}

// Fungsi untuk mengambil data dengan sorting
else {

    $data = sortingProduk($produk);
}

// Fungsi untuk tambah data
tambahProduk($produk);

// Fungsi untuk edit data
editProduk($produk);

// Fungsi untuk hapus data
hapusProduk($produk);



?>


<!DOCTYPE html>

<html>

    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/home.css">
        <link rel="stylesheet" type="text/css" href="css/modal-tambah-edit.css">
    </head>
    
    <body style="background-color: #ededed;">

    <div class="container">

        <br />
        <br />

        <div style="display: flex;">

            <!-- Tombol untuk membuka pop-up modal Tambah Data -->
            <button id="tombolTambahData" style="background-color: #00bcd4; color: white; border: none; cursor: pointer; margin-right: auto; height: 50px; width: 100px; text-align: center;"><b>ADD NEW</b></button>

            <!-- Tombol Logout -->
            <form method="POST" action="" style="display: inline;">
                <button type="submit" name="logout" style="background-color: red; color: white; border: none; cursor: pointer; margin-left: auto; height: 50px; width: 100px; text-align: center;"><b>LOGOUT</b></button>
            </form>

        </div>

        <?php include 'component/modal-tambah-data.php'; ?>
        <?php include 'component/modal-edit-data.php'; ?>

        <!-- Tabel data -->
        <table border='1' bgcolor="white">

            <!-- Baris pertama -->
            <tr>
                <th colspan='7' bgcolor="#9830b0" style='text-align: left; color: white; height: 50px;'>All Product</th>
            </tr>

            <!-- Baris kedua untuk formulir pencarian -->
            <tr>
                <form method='GET' action=''>
                    <th colspan='7'>
                        <label for='keyword'>Cari Jenis Produk Penyelenggara (ID/Jenis Produk):</label>
                        <input type='text' id='keyword' name='keyword' value='<?php echo htmlspecialchars($keyword, ENT_QUOTES); ?>'>
                        <input type='submit' value='Cari'>
                    </th>
                </form>
            </tr>

            <!-- Baris header kolom -->
            <tr style='color: a339b6;'>
                <th>ID<img src="asset/sort-icon.png" style='width:12px; height:12px; margin-left: 10px;' onclick="sortTable('id')" /></th>
                <th>Jenis Produk<img src="asset/sort-icon.png" style='width:12px; height:12px; margin-left: 10px;' onclick="sortTable('jenis_produk')" /></th>
                <th>Deskripsi<img src="asset/sort-icon.png" style='width:12px; height:12px; margin-left: 10px;' onclick="sortTable('deskripsi')" /></th>
                <th>Gambar</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>

            <?php
                
                if (isset($data) && is_array($data)) {
                    foreach ($data as $row) {

                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['jenis_produk'] . "</td>";
                        echo "<td>" . $row['deskripsi'] . "</td>";
                        echo "<td><img src='image/" . $row['gambar'] . "' style='width:200px; height:200px;'/></td>";
                        echo "<td>" . $row['dibuat'] . "</td>";
                        echo "<td>" . $row['diupdate'] . "</td>";

                        echo "<td>

                                <button class='tombolEditData' data-id='" . $row['id'] . "' data-jenis-produk='" . $row['jenis_produk'] . "' data-deskripsi='" . $row['deskripsi'] . "' data-gambar='" . $row['gambar'] . "' style='background-color: #00bcd4; color: white; border: none; padding: 10px 25px; cursor: pointer; height: 50px; width: 100px;'>
                                    <b><img src='asset/edit-icon.png' style='width: 35px; height: 35px;'/></b>
                                </button>

                                <br />
                                <br />

                                <form method='POST' action='' name='form-hapus' onsubmit='return konfirmasiHapus();'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <button type='submit' name='hapus-produk' style='background-color: red; color: white; border: none; padding: 10px 25px; cursor: pointer; height: 50px; width: 100px;'>
                                        <b><img src='asset/delete-icon.png' style='width: 30px; height: 30px;'/></b>
                                    </button>
                                </form>

                              </td>";

                        echo "</tr>";
                    }

                }
                
                else {
                    
                    echo "<tr><td colspan='7'>Data tidak ditemukan atau tidak ada untuk ditampilkan.</td></tr>";
                }
                
            ?>

            <!-- Row paling bawah bebas mau diisi apa aja -->
            <tr>
                <th colspan='7' style='text-align: center;'>THOMAS BECKET TEGAR SURYA CHRISTY (2023081018)</th>
            </tr>
            
        </table>

    </div>



    <!-- Fungsi JavaScript open pop-up Modal Tambah dan Edit Data-->
    <script>

        // Ambil button yang membuka modal
        var tombolTambahData = document.getElementById("tombolTambahData");

        // Ambil modal
        var modalTambahData = document.getElementById("modalTambahData");
        var modalEditData = document.getElementById("modalEditData");

        // Ambil elemen span yang menutup pop-up modal
        var spanCloseTambah = document.getElementById("closeTambahData");
        var spanCloseEdit = document.getElementById("closeEditData");

        // Ketika pengguna mengklik tombol, buka pop-up modal
        tombolTambahData.onclick = function() {
            modalTambahData.style.display = "block";
        }

        // Ketika pengguna mengklik span (x), tutup pop-up modal
        spanCloseTambah.onclick = function() {
            modalTambahData.style.display = "none";
        }

        spanCloseEdit.onclick = function() {
            modalEditData.style.display = "none";
        }

        // Ambil data dari database saat membuka pop-up modal Edit Data
        var tombolEditData = document.getElementsByClassName("tombolEditData");
        
        for (var i = 0; i < tombolEditData.length; i++) {

            tombolEditData[i].onclick = function() {
                
                var id = this.dataset.id;
                var jenisProduk = this.dataset.jenisProduk;
                var deskripsi = this.dataset.deskripsi;
                var gambar = this.dataset.gambar;

                document.getElementById('edit-produk').value = id;
                document.getElementById('edit-jenis-produk').value = jenisProduk;
                document.getElementById('edit-deskripsi').value = deskripsi;

                modalEditData.style.display = "block";
            }
        }
        
    </script>

    <!-- Fungsi JavaScript untuk melakukan sorting-->
    <script>

    function sortTable(column) {
        var url = new URL(window.location.href);
        var sortTypeSaatIni = url.searchParams.get('sorttype') || 'asc';
        var sortTypeBaru = sortTypeSaatIni === 'asc' ? 'desc' : 'asc';

        // Mengatur parameter sortby berdasarkan kolom yang diklik
        if (column === 'id' || column === 'jenis_produk' || column === 'deskripsi') {
            url.searchParams.set('sortby', column);
            url.searchParams.set('sorttype', sortTypeBaru);
            window.location.href = url.toString();
        }
    }

    </script>

    <!-- Fungsi JavaScript untuk menampilkan konfirmasi sebelum menghapus data-->
    <script>
        
        function konfirmasiHapus() {
            return confirm("Are you sure you want to delete this?");
        }

        // Mengambil semua form dengan name 'form-hapus'
        var forms = document.getElementsByName('form-hapus');

        // Menggunakan event listener untuk menangkap event submit
        forms[i].addEventListener('submit', function(event) {

            // Jika hasil dari konfirmasi adalah false, maka hentikan proses submit
            if (!konfirmasiHapus()) {
                event.preventDefault();
            }

        });
        

    </script>

    </body>

</html>
