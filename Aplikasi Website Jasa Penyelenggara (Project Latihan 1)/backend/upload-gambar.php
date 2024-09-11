<?php

function uploadGambar($file) {

    // Cek apakah file sudah terupload
    if ($file['error'] === UPLOAD_ERR_OK) {

        // Mengambil file extension
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Memvalidasi file extension
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($fileExtension, $allowedExtensions)) {
            return null; // Invalid file extension
        }

        // Melakukan generate filename secara unik
        $newFilename = uniqid() . "." . $fileExtension;

        // Memindahkan gambar yang telah diupload ke direktori image/
        $targetDir = "image/";
        $targetFile = $targetDir . $newFilename;

        if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
            return null; // Gagal untuk upload file
        }

        return $newFilename; // Mengembalikan filename

    } else {
        return null; // Error saat mengupload file
    }
}
?>
