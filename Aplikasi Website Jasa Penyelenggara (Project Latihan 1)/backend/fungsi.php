<?php

date_default_timezone_set('Asia/Jakarta');

include 'koneksi.php';
include 'jasa-penyelenggara.php';
include 'upload-gambar.php';

$db = new koneksidb();
$db->koneksi();

$produk = new JasaPenyelenggara($db);

function tambahProduk($produk) {

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah-produk'])) {

        Session::start();

        $id = $_POST['tambah-produk'];
        $jenis_produk = $_POST['tambah-jenis-produk'];
        $deskripsi = $_POST['tambah-deskripsi'];
        $gambar = uploadGambar($_FILES['tambah-gambar']);
        $dibuat_oleh = Session::get('id_user')['username'];
        $dibuat = date('Y-m-d H:i:s'); // Tambahkan timestamp saat ini

        // Panggil method untuk menyimpan data ke database
        $produk->simpanDataJasaPenyelenggara($id, $jenis_produk, $deskripsi, $gambar, $dibuat, $dibuat_oleh);

        // Redirect kembali ke halaman home untuk menghindari resubmission form
        header("Location: home.php");
        exit;

    }
}

function editProduk($produk) {

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit-produk'])) {

        Session::start();

        $id = $_POST['edit-id-produk'];
        $jenis_produk = $_POST['edit-jenis-produk'];
        $deskripsi = $_POST['edit-deskripsi'];

        // Upload gambar baru jika ada
        if (isset($_FILES['edit-gambar']) && $_FILES['edit-gambar']['error'] == UPLOAD_ERR_OK) {
            $gambar = uploadGambar($_FILES['edit-gambar']);

        }
        
        else {
            
            $gambar = $produk->ambilGambarJasaPenyelenggara($id); // Mengambil gambar yang sudah ada jika tidak ada gambar yang diunggah
        }

        $diupdate = date('Y-m-d H:i:s'); // Tambahkan timestamp saat ini
        $diupdate_oleh = Session::get('id_user')['username'];

        // Panggil method untuk mengedit data di database
        $produk->editDataJasaPenyelenggara($id, $jenis_produk, $deskripsi, $gambar, $diupdate, $diupdate_oleh);

        // Redirect kembali ke halaman home untuk menghindari resubmission form
        header("Location: home.php");
        exit;

    }
}

function hapusProduk($produk) {

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus-produk'])) {

        $id = $_POST['id'];

        // Panggil method hapusDataJasaPenyelenggara untuk menghapus Jasa Penyelenggara
        $produk->hapusDataJasaPenyelenggara($id);

        // Redirect kembali ke halaman home untuk menghindari resubmission form
        header("Location: home.php");
        exit;
        
    }
}


function sortingProduk($produk) {
    
    $sortBy = isset($_GET['sortby']) ? $_GET['sortby'] : 'id';
    $sortType = isset($_GET['sorttype']) ? $_GET['sorttype'] : 'asc';

    // Memanggil method untuk Sorting Data
    $data = $produk->sortingData($sortBy, $sortType);
    
    return $data;

}

?>