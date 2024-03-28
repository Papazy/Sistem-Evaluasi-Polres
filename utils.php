<?php
require_once "config.php";
// Fungsi untuk menghitung jumlah Persentase PG yang <= Min untuk setiap periode


function hitungPersentaseMerahDariMinSetiapPeriode() {
    // Query untuk mendapatkan setiap periode yang unik
    $koneksi = mysqli_connect("localhost", "root", "", "evaluasi");
    $query_periode = "SELECT DISTINCT Periode FROM persentase_polres";
    $result_periode = mysqli_query($koneksi, $query_periode);

    // Inisialisasi array untuk menyimpan hasil per periode
    $hasil_per_periode = array();

    // Loop melalui setiap periode
    while ($row_periode = mysqli_fetch_assoc($result_periode)) {
        $periode = $row_periode['Periode'];

        // Query untuk menghitung jumlah data yang memenuhi kriteria untuk periode tertentu
        $query_total_merah = "SELECT COUNT(*) AS total FROM persentase_polres pp
                        INNER JOIN laporan_polres lp ON pp.PG = lp.PG
                        WHERE pp.Periode = '$periode' AND pp.Persentase <= lp.Min";

        $result_total = mysqli_query($koneksi, $query_total_merah);

        if ($result_total) {
            // Ambil jumlah total dari hasil query
            $row_total = mysqli_fetch_assoc($result_total);
            $total = $row_total['total'];

            // Simpan jumlah total ke dalam array hasil_per_periode
            $hasil_per_periode[$periode] = $total;
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }

    // Tutup koneksi
    mysqli_close($koneksi);

    // Kembalikan array dengan hasil per periode
    return $hasil_per_periode;
}
function hitungPersentaseKuningDariMinSetiapPeriode() {
    // Query untuk mendapatkan setiap periode yang unik
    $koneksi = mysqli_connect("localhost", "root", "", "evaluasi");
    $query_periode = "SELECT DISTINCT Periode FROM persentase_polres";
    $result_periode = mysqli_query($koneksi, $query_periode);

    // Inisialisasi array untuk menyimpan hasil per periode
    $hasil_per_periode = array();

    // Loop melalui setiap periode
    while ($row_periode = mysqli_fetch_assoc($result_periode)) {
        $periode = $row_periode['Periode'];

        // Query untuk menghitung jumlah data yang memenuhi kriteria untuk periode tertentu
        $query_total_merah = "SELECT COUNT(*) AS total FROM persentase_polres pp
                        INNER JOIN laporan_polres lp ON pp.PG = lp.PG
                        WHERE pp.Periode = '$periode' AND pp.Persentase < lp.Max AND pp.Persentase > lp.Min";

        $result_total = mysqli_query($koneksi, $query_total_merah);

        if ($result_total) {
            // Ambil jumlah total dari hasil query
            $row_total = mysqli_fetch_assoc($result_total);
            $total = $row_total['total'];

            // Simpan jumlah total ke dalam array hasil_per_periode
            $hasil_per_periode[$periode] = $total;
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }

    // Tutup koneksi
    mysqli_close($koneksi);

    // Kembalikan array dengan hasil per periode
    return $hasil_per_periode;
}
function hitungPersentaseHijauDariMinSetiapPeriode() {
    // Query untuk mendapatkan setiap periode yang unik
    $koneksi = mysqli_connect("localhost", "root", "", "evaluasi");
    $query_periode = "SELECT DISTINCT Periode FROM persentase_polres";
    $result_periode = mysqli_query($koneksi, $query_periode);

    // Inisialisasi array untuk menyimpan hasil per periode
    $hasil_per_periode = array();

    // Loop melalui setiap periode
    while ($row_periode = mysqli_fetch_assoc($result_periode)) {
        $periode = $row_periode['Periode'];

        // Query untuk menghitung jumlah data yang memenuhi kriteria untuk periode tertentu
        $query_total_merah = "SELECT COUNT(*) AS total FROM persentase_polres pp
                        INNER JOIN laporan_polres lp ON pp.PG = lp.PG
                        WHERE pp.Periode = '$periode' AND pp.Persentase >= lp.Max";

        $result_total = mysqli_query($koneksi, $query_total_merah);

        if ($result_total) {
            // Ambil jumlah total dari hasil query
            $row_total = mysqli_fetch_assoc($result_total);
            $total = $row_total['total'];

            // Simpan jumlah total ke dalam array hasil_per_periode
            $hasil_per_periode[$periode] = $total;
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }

    // Tutup koneksi
    mysqli_close($koneksi);

    // Kembalikan array dengan hasil per periode
    return $hasil_per_periode;
}

function jumlahTotalPersentase($arr){
    $total = 0;
    foreach($arr as $ar => $jumlah){
        $total = $total + $jumlah;
    }
    return $total;
}

// Contoh pemanggilan fungsi untuk menghitung jumlah Persentase PG yang <= Min untuk setiap periode
$hasil = hitungPersentaseMerahDariMinSetiapPeriode();

// Tampilkan hasil per periode
foreach ($hasil as $periode => $jumlah) {
    echo "Jumlah Persentase PG yang <= Min dari periode $periode: $jumlah<br>";
}

$total = jumlahTotalPersentase($hasil);

function cariJumlahPolresMerah(){
    $hasil1 = hitungPersentaseMerahDariMinSetiapPeriode();
    $total1 = jumlahTotalPersentase($hasil1);
    return $total1;
}
function cariJumlahPolresKuning(){
    $hasil1 = hitungPersentaseKuningDariMinSetiapPeriode();
    $total1 = jumlahTotalPersentase($hasil1);
    return $total1;
}
function cariJumlahPolresHijau(){
    $hasil1 = hitungPersentaseHijauDariMinSetiapPeriode();
    $total1 = jumlahTotalPersentase($hasil1);
    return $total1;
}

echo "Total : $total"

?>