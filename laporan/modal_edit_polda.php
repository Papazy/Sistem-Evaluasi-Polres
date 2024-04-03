<?php
require_once "../config.php";

$id = 0;
if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
}

$sql = "SELECT * FROM persentase_polda WHERE id = $id";
$result = mysqli_query($koneksi, $sql);

if($result && mysqli_num_rows($result) > 0) {
    $dataPersentase = mysqli_fetch_assoc($result);
    $Min = 0;
    $Max = 0;
    $sqlMinMax = "SELECT * FROM laporan_polda WHERE periode = '".$dataPersentase['Periode']."' AND PG = '".$dataPersentase['PG']."'";
    $resultMinMax = mysqli_query($koneksi, $sqlMinMax);
    if($resultMinMax && mysqli_num_rows($resultMinMax) > 0){
        $dataMinMax = mysqli_fetch_assoc($resultMinMax);
        $Min = $dataMinMax['Min'];
        $Max = $dataMinMax['Max'];
    }

    $response = '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalEdit' . $dataPersentase['id'] . 'Label">
                Edit Data </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
            
                <input type="hidden" name="id" value="' . $dataPersentase['id'] . '" />
                <input type="hidden" name="Min" value="' . $Min . '" />
                <input type="hidden" name="Max" value="' . $Max . '" />
                <input type="hidden" name="Periode_old" value="' . $dataPersentase['Periode'] . '" />
                <input type="hidden" name="PG_old" value="' . $dataPersentase['PG'] . '" />
                <div class="form-group mb-2">
                    <label style="font-weight:600;" for="exampleFormControlInput1">Satuan Kerja</label>
                    <input type="text" class="form-control" value="' . $dataPersentase['Satker'] . '" name="Satker" readonly>
                </div>
                <div class="form-group mb-2">
                    <label style="font-weight:600;" for="exampleFormControlInput1">Persentase</label>
                    <input name="Persentase" type="text" class="form-control" value="' . $dataPersentase['Persentase'] . '">
                </div>
                <div class="form-group mb-2">
                    <label for="PG" style="font-weight:600;">Program Giat</label>
                    <!-- Select Options -->
                    <select name="PG" class="form-control" id="PG" class="form-select border-0 border-bottom">
                    <option value="PAG1" '.($dataPersentase["PG"] == "PAG1").'>PAG1</option>
                    <option value="PAG2" '.($dataPersentase["PG"] == "PAG2").'>PAG2</option>
                    <option value="PCG7" '.($dataPersentase["PG"] == "PCG7").'>PCG7</option>
                    <option value="PCG8" '.($dataPersentase["PG"] == "PCG8").'>PCG8</option>
                    <option value="PCG9.1" '.($dataPersentase["PG"] == "PCG9.1").'>PCG9.1</option>
                    <option value="PCG9.2" '.($dataPersentase["PG"] == "PCG9.2").'>PCG9.2</option>
                    <option value="PCG9.3" '.($dataPersentase["PG"] == "PCG9.3").'>PCG9.3</option>
                    <option value="PCG9.4" '.($dataPersentase["PG"] == "PCG9.4").'>PCG9.4</option>
                    <option value="PDG10" '.($dataPersentase["PG"] == "PDG10").'>PDG10</option>
                    <option value="PDG11" '.($dataPersentase["PG"] == "PDG11").'>PDG11</option>
                    <option value="PEG13" '.($dataPersentase["PG"] == "PEG13").'>PEG13</option>
                    <option value="PEG14" '.($dataPersentase["PG"] == "PEG14").'>PEG14</option>
                    <option value="PFG15" '.($dataPersentase["PG"] == "PFG15").'>PFG15</option>
                    <option value="PGG16" '.($dataPersentase["PG"] == "PGG16").'>PGG16</option>
                        <!-- Tambahkan sisa opsi di sini -->
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label style="font-weight:600;" for="exampleFormControlInput1">Periode</label>
                    <input type="date" name="Periode" class="form-control-plaintext border-bottom" id="Periode" value="' . $dataPersentase["Periode"] . '" />
                </div>
                <div class="form-group mb-2">
                    <label style="font-weight:600;" for="exampleFormControlInput1">Triwulan</label>
                    <!-- Select Options -->
                    <select name="Triwulan" id="Triwulan" class="form-select border-0 border-bottom">
                        <option value="1" ' . ($dataPersentase['Triwulan'] == "1" ? "selected" : "") . '>1</option>
                        <option value="2" ' . ($dataPersentase['Triwulan'] == "2" ? "selected" : "") . '>2</option>
                        <option value="3" ' . ($dataPersentase['Triwulan'] == "3" ? "selected" : "") . '>3</option>
                        <option value="4" ' . ($dataPersentase['Triwulan'] == "4" ? "selected" : "") . '>4</option>
                        <!-- Tambahkan sisa opsi di sini -->
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" id="submit" class="btn btn-primary">Simpan</button>
        </div>
        
    </div>
</div>';

    echo $response;
} else {
    // Jika tidak ada data ditemukan, tampilkan pesan error atau tindakan lain yang sesuai
    echo "Data tidak ditemukan";
}
?>

