<?php
session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "gabungan - Sistem Evaluasi Polres";
require_once "../tamplate/header.php";
require_once "../tamplate/navbar.php";
require_once "../tamplate/sidebar.php";

$PG_ALL = [
    "A11",
    "A21",
    "A41",
    "C72",
    "C81",
    "C82",
    "D101",
    "D102",
    "D103",
    "D104",
    "D111",
    "D112",
    "D121",
    "D122",
    "E131",
    "E132",
    "E141",
    "E142",
    "E151",
    "E152",
    "G161"
];

?>

<div id="layoutSidenav_content">
    <main>
        <div class="px-4">
            <div class="d-flex align-items-end mb-2">
                <div class="col">
                    <h1 class="mt-4">Total</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Total</li>
                    </ol>
                </div>
                <div class="col-auto me-3">
                    <a href="<?php echo $main_url?>gabungan/polda.php" class="btn btn-secondary">
                        Data Polda
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="card d-flex flex-column">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Polres</span>
                    <a href="<?= $main_url ?>laporan/add-laporan.php" class="btn btn-sm btn-primary float-end"><i
                            class="fa-solid fa-plus"></i> Tambah</a>
                    <a href="<?= $main_url ?>laporan/cetak-laporan.php" class="btn btn-sm btn-success float-end me-1"><i
                            class="fa-solid fa-print"></i>
                        Cetak</a>
                </div>
                <div class="card-body overflow-auto">
                    <div class="row mt-3">
                        <div class="col-auto">

                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Polres</th>
                                        <th colspan="21">Program Giat</th>
                                        <th rowspan="2">Total</th>
                                        <th rowspan="2">Min</th>
                                        <th rowspan="2">Max</th>
                                        <th rowspan="2">Periode</th>
                                    </tr>
                                    <tr>
                                        <th>A11</th>
                                        <th>A21</th>
                                        <th>A41</th>
                                        <th>C72</th>
                                        <th>C81</th>
                                        <th>C82</th>
                                        <th>D101</th>
                                        <th>D102</th>
                                        <th>D103</th>
                                        <th>D104</th>
                                        <th>D111</th>
                                        <th>D112</th>
                                        <th>D121</th>
                                        <th>D122</th>
                                        <th>E131</th>
                                        <th>E132</th>
                                        <th>E141</th>
                                        <th>E142</th>
                                        <th>E151</th>
                                        <th>E152</th>
                                        <th>G161</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        // Mendapatkan semua satker
                                        $queryPG = mysqli_query($koneksi, "SELECT DISTINCT Polres FROM persentase_polres");
                                        $queryData = mysqli_query($koneksi, "SELECT Min, Max, Periode FROM laporan_polres");

                                        $Min = null;
                                        $Max = null;
                                        $Periode = null;

                                        while ($row = mysqli_fetch_array($queryData)) {
                                            // Mengambil nilai Min pertama kali
                                            if ($Min === null) {
                                                $Min = (float)$row["Min"];
                                            }
                                            // Mengambil nilai Max pertama kali
                                            if ($Max === null) {
                                                $Max = (float)$row["Max"];
                                            }
                                            // Mengambil nilai Periode pertama kali
                                            if ($Periode === null) {
                                                $Periode = $row["Periode"];
                                            }
                                        }

                                        // Inisialisasi array untuk menyimpan data Polres berdasarkan PG
                                        $dataPolres = array();
                                        while ($row = mysqli_fetch_assoc($queryPG)) {
                                            $dataPolres[$row['Polres']] = array(
                                                "A11" => -1,
                                                "A21" => -1,
                                                "A41" => -1,
                                                "C72" => -1,
                                                "C81" => -1,
                                                "C82" => -1,
                                                "D101" => -1,
                                                "D102" => -1,
                                                "D103" => -1,
                                                "D104" => -1,
                                                "D111" => -1,
                                                "D112" => -1,
                                                "D121" => -1,
                                                "D122" => -1,
                                                "E131" => -1,
                                                "E132" => -1,
                                                "E141" => -1,
                                                "E142" => -1,
                                                "E151" => -1,
                                                "E152" => -1,
                                                "G161" => -1
                                            );
                                        }

                                        // Mengambil data dari database dan mengisi array $dataPolres
                                        $queryData = mysqli_query($koneksi, "SELECT Polres, PG, Persentase FROM persentase_polres");
                                        while ($data = mysqli_fetch_assoc($queryData)) {
                                            $dataPolres[$data['Polres']][$data['PG']] = $data['Persentase'];
                                        }

                                        // Menyusun data Polres berdasarkan PG ke dalam tabel
                                        foreach ($dataPolres as $polres => $pg) {
                                            $total = 0;
                                            $count = 0;
                                            echo "<tr>";
                                            echo "<td>{$no}</td>";
                                            echo "<td>{$polres}</td>";
                                            foreach ($PG_ALL as $program) { // Sesuaikan dengan PG yang Anda perlukan
                                                $total =  $total + (float)$pg[$program];
                                                $persen = $pg[$program];
                                                $count++;
                                                if ($pg[$program] == -1) {
                                                    echo "<td></td>"; // Jika nilai null, tampilkan sel kosong
                                                    $count--;
                                                } elseif ($persen >= $Max) {
                                                    echo "<td class='table-success'>{$persen}</td>"; // Jika persen lebih besar atau sama dengan Max, gunakan bg-successfull
                                                } elseif ($persen > $Min) {
                                                    echo "<td class='table-warning'>{$persen}</td>"; // Jika persen di antara Min dan Max, gunakan bg-warning
                                                } else {
                                                    echo "<td class='table-danger'>{$persen}</td>"; // Jika persen kurang dari atau sama dengan Min, gunakan bg-danger
                                                }
                                            }
                                            $total = $total / $count;
                                            if ($total == -1) {
                                                echo "<td></td>"; // Jika nilai null, tampilkan sel kosong
                                                $count--;
                                            } elseif ($total >= $Max) {
                                                echo "<td class='table-success'>{$total}</td>"; // Jika total lebih besar atau sama dengan Max, gunakan bg-successfull
                                            } elseif ($total > $Min) {
                                                echo "<td class='table-warning'>{$total}</td>"; // Jika total di antara Min dan Max, gunakan bg-warning
                                            } else {
                                                echo "<td class='table-danger'>{$total}</td>"; // Jika total kurang dari atau sama dengan Min, gunakan bg-danger
                                            }
                                            // echo "<td>{$total}</td>"; // Kolom Min
                                            echo "<td>{$Min}</td>"; // Kolom Min
                                            echo "<td>{$Max}</td>"; // Kolom Max
                                            echo "<td>{$Periode}</td>"; // Kolom Priode
                                            echo "</tr>";
                                            $no++;
                                        }
                                        ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <?php
require_once "../tamplate/footer.php";
?>