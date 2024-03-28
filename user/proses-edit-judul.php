<?php 

    session_start();
        
    if (!isset($_SESSION["ssLogin"])) {
        header("location: auth/login.php");
        exit;
    }
    
    require_once "../config.php";

    // jika tombol simpan ditekan
    if (isset($_POST['judul'])) {
        $main_title = $_POST['judul'];
        $_SESSION['main_title'] = $main_title;
    }
    header("Location:edit-judul.php");
    exit;

?>