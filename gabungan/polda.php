<?php
session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "gabungan - Sistem Evaluasi Polres";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$queryPeriode = mysqli_query($koneksi, "SELECT DISTINCT Periode FROM laporan_polda");
$PERIODE_ALL = array();
while ($periode = mysqli_fetch_array($queryPeriode)) {
    $PERIODE_ALL[] = $periode["Periode"];
}
$periode_select = 0;
if (count($PERIODE_ALL) > 0) {
    $periode_select = $PERIODE_ALL[count($PERIODE_ALL) - 1];
}
if (isset($_GET['periode'])) {
    $periode_select = $_GET['periode'];
}
$PG_ALL = [
    'PAG1',
    'PAG2',
    'PCG7',
    'PCG8',
    'PCG9.1',
    'PCG9.2',
    'PCG9.3',
    'PCG9.4',
    'PDG10',
    'PDG11',
    'PEG13',
    'PEG14',
    'PFG15',
    'PGG16'
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
                    <a href="<?php echo $main_url ?>gabungan/polres.php" class="btn btn-secondary">
                        Data Polres
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="card d-flex flex-column">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Polda</span>
                    <div class="d-flex align-items-center">
                        <label class="mx-2 ">Periode</label>
                        <select class="form-select" style="width: 150px;" onchange="location = this.value;">
                            <?php
                            foreach ($PERIODE_ALL as $periode) {
                                $selected = $periode == $periode_select ? "selected" : "";
                                echo "<option value='?periode={$periode}' {$selected}>{$periode}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="card-body overflow-auto">
                    <div class="row mt-3">
                        <div class="col-auto">

                            <table class="table table-bordered" id="example">
                                <thead class="thead-dark">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Satuan Kerja</th>
                                        <th colspan="14">Program Giat</th>
                                        <th rowspan="2">Total</th>
                                        <th rowspan="2">Min</th>
                                        <th rowspan="2">Max</th>
                                        <th rowspan="2">Periode</th>
                                    </tr>
                                    <tr>
                                        <th>PAG1</th>
                                        <th>PAG2</th>
                                        <th>PCG7</th>
                                        <th>PCG8</th>
                                        <th>PCG9.1</th>
                                        <th>PCG9.2</th>
                                        <th>PCG9.3</th>
                                        <th>PCG9.4</th>
                                        <th>PDG10</th>
                                        <th>PDG11</th>
                                        <th>PEG13</th>
                                        <th>PEG14</th>
                                        <th>PFG15</th>
                                        <th>PGG16</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    // Mendapatkan semua satker
                                    $queryPG = mysqli_query($koneksi, "SELECT DISTINCT Satker FROM persentase_polda");
                                    $queryData = mysqli_query($koneksi, "SELECT Min, Max, Periode FROM laporan_polda where Periode = '{$periode_select}'");

                                    $Min = null;
                                    $Max = null;
                                    $Periode = null;

                                    while ($row = mysqli_fetch_array($queryData)) {
                                        // Mengambil nilai Min pertama kali
                                        if ($Min === null) {
                                            $Min = (float) $row["Min"];
                                        }
                                        // Mengambil nilai Max pertama kali
                                        if ($Max === null) {
                                            $Max = (float) $row["Max"];
                                        }
                                        // Mengambil nilai Periode pertama kali
                                        if ($Periode === null) {
                                            $Periode = $row["Periode"];
                                        }
                                    }

                                    // Inisialisasi array untuk menyimpan data polda berdasarkan PG
                                    $datapolda = array();
                                    while ($row = mysqli_fetch_assoc($queryPG)) {
                                        $datapolda[$row['Satker']] = array(
                                            'PAG1' =>-1,
                                            'PAG2' =>-1,
                                            'PCG7' =>-1,
                                            'PCG8' =>-1,
                                            'PCG9.1' =>-1,
                                            'PCG9.2' =>-1,
                                            'PCG9.3' =>-1,
                                            'PCG9.4' =>-1,
                                            'PDG10' =>-1,
                                            'PDG11' =>-1,
                                            'PEG13' =>-1,
                                            'PEG14' =>-1,
                                            'PFG15' =>-1,
                                            'PGG16' => -1
                                        );
                                    }

                                    // Mengambil data dari database dan mengisi array $datapolda
                                    $queryData = mysqli_query($koneksi, "SELECT Satker, PG, Persentase FROM persentase_polda WHERE Periode = '{$periode_select}'");
                                    while ($data = mysqli_fetch_assoc($queryData)) {
                                        $datapolda[$data['Satker']][$data['PG']] = $data['Persentase'];
                                    }

                                    // Menyusun data polda berdasarkan PG ke dalam table
                                    foreach ($datapolda as $polda => $pg) {
                                        $total = 0;
                                        $count = 0;
                                        echo "<tr>";
                                        echo "<td>{$no}</td>";
                                        echo "<td>{$polda}</td>";
                                        $i = 0;
                                        foreach ($PG_ALL as $program) { // Sesuaikan dengan PG yang Anda perlukan
                                            if ($pg[$program] != -1) {
                                                $total = $total + (float) $pg[$program];
                                            }
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
                                        if ($count) {
                                            $total = $total / $count;
                                        }
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

    <script>
        function updateURL(select) {
            var selectedPeriode = select.value;
            var currentURL = new URL(window.location.href);
            currentURL.searchParams.set('periode', selectedPeriode);
            window.location.href = currentURL.href;
        }
    </script>

    <?php
    require_once "../template/footer.php";
    ?>