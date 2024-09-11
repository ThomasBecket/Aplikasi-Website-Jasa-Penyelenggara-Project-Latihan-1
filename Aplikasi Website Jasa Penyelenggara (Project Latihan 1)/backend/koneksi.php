<?php

class koneksidb {
    
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "aplikasi_website_jasa_penyelenggara";
    private $koneksi;

    // Method untuk menetapkan koneksi dari database
    public function koneksi() {

        $this->koneksi = new mysqli($this->server, $this->user, $this->password, $this->database);

        if ($this->koneksi->connect_error) {

            echo "<script>console.log('Koneksi Gagal" . $this->koneksi->connect_error . "');</script>";

            die("Koneksi Gagal" . $this->koneksi->connect_error);
        }

        else {

            echo "<script>console.log('Koneksi Berhasil');</script>";
        }
    }

    // Method untuk melakukan execute pada query
    public function query($sql) {
        return $this->koneksi->query($sql);
    }

    // Method untuk melakukan pengambilan data atau fetch data
    public function fetchData($sql) {

        $result = $this->query($sql);

        if (!$result) {
            return []; // Mengembalikan array kosong jika query gagal
        }

        $rows = [];

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        
        return $rows;
    }
}
?>
