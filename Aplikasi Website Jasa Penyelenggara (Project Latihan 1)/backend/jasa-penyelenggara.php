<?php

class JasaPenyelenggara {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Method untuk menyimpan data jasa penyelenggara
    public function simpanDataJasaPenyelenggara($id, $jenis_produk, $deskripsi, $gambar, $dibuat, $dibuat_oleh) {
        $dibuat_oleh = Session::get('id_user')['username'];
        $sql = "INSERT INTO jasa_penyelenggara (id, jenis_produk, deskripsi, gambar, dibuat, dibuat_oleh) VALUES ($id, '$jenis_produk', '$deskripsi', '$gambar', '$dibuat', '$dibuat_oleh')";
        $this->db->query($sql);
    }

    // Method untuk mengedit data jasa penyelenggara
    public function editDataJasaPenyelenggara($id, $jenis_produk, $deskripsi, $gambar, $diupdate, $diupdate_oleh) {
        $diupdate_oleh = Session::get('id_user')['username'];
        $sql = "UPDATE jasa_penyelenggara SET jenis_produk = '$jenis_produk', deskripsi = '$deskripsi', gambar = '$gambar', diupdate = '$diupdate', diupdate_oleh = '$diupdate_oleh' WHERE id = $id";
        $this->db->query($sql);
    }

    
    // Method untuk menghapus data jasa penyelenggara
    public function hapusDataJasaPenyelenggara($id) {
        $sql = "DELETE FROM jasa_penyelenggara WHERE id = $id";
        $this->db->query($sql);
    }

    
    // Method untuk mengambil semua data jasa penyelenggara
    public function ambilDataJasaPenyelenggara($dataPenyelenggara) {
        $sql = "SELECT * FROM jasa_penyelenggara $dataPenyelenggara";
        return $this->db->fetchData($sql);
    }

    // Method untuk mencari data jasa penyelenggara
    public function cariDataJasaPenyelenggara($keyword) {
        $dataPenyelenggara = '';
        if (!empty($keyword)) {
            $dataPenyelenggara = "WHERE id LIKE '%$keyword%' OR jenis_produk LIKE '%$keyword%'";
        }
        return $dataPenyelenggara;
    }

    // Method untuk mengambil gambar dari database
    public function ambilGambarJasaPenyelenggara($id) {
        $sql = "SELECT gambar FROM jasa_penyelenggara WHERE id = $id";
        $result = $this->db->fetchData($sql);
        
        if (count($result) == 0) {
            
            return null;

        }

        else {

            return $result[0]['gambar'];
        }
    }

    // Method untuk melakukan sorting
    public function sortingData($sortBy, $sortType) {
        
        $kolomData = ['id', 'jenis_produk', 'deskripsi'];
        $tipeData = ['asc', 'desc'];

        // Melakukan validasi pada parameter sorting
        if (!in_array($sortBy, $kolomData) || !in_array($sortType, $tipeData)) {
            return []; // Handle error
        }

        // Jika sorting berdasarkan kolom id, tambahkan CAST untuk memastikan sorting angka
        if ($sortBy == 'id') {

            $sql = "SELECT * FROM jasa_penyelenggara ORDER BY CAST($sortBy AS UNSIGNED) $sortType";

        }
        
        else {

            $sql = "SELECT * FROM jasa_penyelenggara ORDER BY $sortBy $sortType";
        }

        return $this->db->fetchData($sql);

    }
}
?>
