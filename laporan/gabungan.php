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

?>

<div id="layoutSidenav_content">
    <main>
        <div class="px-4">
            <h1 class="mt-4">Gabungan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Gabungan</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data gabungan</span>
                    <a href="<?= $main_url ?>laporan/add-laporan.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah</a>
                    <a href="<?= $main_url ?>laporan/cetak-laporan.php" class="btn btn-sm btn-success float-end me-1"><i class="fa-solid fa-print"></i> Cetak</a>
                </div>
                <div class="card-body">
                    <div class="mt-3">
                        <h5>POLDA</h5>
                        <table class="table table-bordered">
                            <style>
                                .table-bordered {
                                    border-collapse: collapse;
                                }

                                .table-bordered th,
                                .table-bordered td {
                                    border: 1px solid #000;
                                    padding: 8px;
                                    text-align: center;
                                }
                            </style>

                            <thead class="thead-dark">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Satker</th>
                                    <th colspan="21">Program Giat</th>
                                    <th rowspan="2">Min</th>
                                    <th rowspan="2">Max</th>
                                    <th rowspan="2">Priode</th>
                                    
                                </tr>
                                <tr>
                                <th colspan="1">A11</th>
                                    <th colspan="1">A21</th>
                                    <th colspan="1">A41</th>
                                    <th colspan="1">C72</th>
                                    <th colspan="1">C81</th>
                                    <th colspan="1">C82</th>
                                    <th colspan="1">D101</th>
                                    <th colspan="1">D102</th>
                                    <th colspan="1">D103</th>
                                    <th colspan="1">D104</th>
                                    <th colspan="1">D111</th>
                                    <th colspan="1">D112</th>
                                    <th colspan="1">D121</th>
                                    <th colspan="1">D122</th>
                                    <th colspan="1">E131</th>
                                    <th colspan="1">E132</th>
                                    <th colspan="1">E141</th>
                                    <th colspan="1">E142</th>
                                    <th colspan="1">F151</th>
                                    <th colspan="1">F152</th>
                                    <th colspan="1">G161</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Polres 1</td>
                                    <td>Program 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Program 1</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Min 1</td>
                                    <td>Max 1</td>
                                    <td>Priode</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-1">
                        <h5>POLRES</h5>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Polres</th>
                                    <th colspan="21">Program Giat</th>
                                    <th rowspan="2">Min</th>
                                    <th rowspan="2">Max</th>
                                    <th rowspan="2">Priode</th>
                                    
                                </tr>
                                <tr>
                                    <th colspan="1">A11</th>
                                    <th colspan="1">A21</th>
                                    <th colspan="1">A41</th>
                                    <th colspan="1">C72</th>
                                    <th colspan="1">C81</th>
                                    <th colspan="1">C82</th>
                                    <th colspan="1">D101</th>
                                    <th colspan="1">D102</th>
                                    <th colspan="1">D103</th>
                                    <th colspan="1">D104</th>
                                    <th colspan="1">D111</th>
                                    <th colspan="1">D112</th>
                                    <th colspan="1">D121</th>
                                    <th colspan="1">D122</th>
                                    <th colspan="1">E131</th>
                                    <th colspan="1">E132</th>
                                    <th colspan="1">E141</th>
                                    <th colspan="1">E142</th>
                                    <th colspan="1">F151</th>
                                    <th colspan="1">F152</th>
                                    <th colspan="1">G161</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Polres 1</td>
                                    <td>Program 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Program 1</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Periode 2</td>
                                    <td>Periode 1</td>
                                    <td>Periode 2</td>
                                    <td>Min 1</td>
                                    <td>Max 1</td>
                                    <td>Priode</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    

<?php
require_once "../tamplate/footer.php";
?>
</div>

<?php
require_once "../tamplate/footer.php";
?>
