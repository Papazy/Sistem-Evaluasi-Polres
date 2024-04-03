<?php 

    $koneksi = mysqli_connect("localhost", "root", "", "evaluasi");

    // url induk
    $main_url = "http://localhost/Sistem-Evaluasi-Polres-main/";
    if (isset($_SESSION['main_title'])) {
        $main_title = $_SESSION['main_title'];
    } else {
        $main_title = "Capaian Evaluasi Polres"; // Nilai default
    }

    function uploadimg($url) {
        $namaFile = $_FILES['image']['name'];
        $ukuran   = $_FILES['image']['size'];
        $error    = $_FILES['image']['error'];
        $tmp      = $_FILES['image']['tmp_name'];

        // cek file yang diupload
        $validExtension = ['jpg', 'jpeg', 'png'];
        $fileExtension  = explode('.', $namaFile);
        $fileExtension  = strtolower(end($fileExtension));
        
        if (!in_array($fileExtension, $validExtension)) {
            header("location:" . $url . '?msg=notimage');
            die;
        }

        // cek ukuran gambar 
        if ($ukuran > 1000000) {
            header("location:" . $url . '?msg=oversize');
            die;
        }

        // generate nama file gambar
        $namaFileBaru = rand(10, 1000) . '-' . $namaFile;

        // upload gambar 
        move_uploaded_file($tmp, "../asset/image/" . $namaFileBaru);
        return $namaFileBaru;
    }
?>