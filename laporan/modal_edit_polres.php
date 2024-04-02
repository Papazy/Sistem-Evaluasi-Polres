<?php
require_once "../config.php";

$id = 0;
if(isset($_POST['id'])){
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
}

$sql = "SELECT * FROM persentase_polres WHERE id = $id";
$result = mysqli_query($koneksi, $sql);

if($result && mysqli_num_rows($result) > 0) {
    $dataPersentase = mysqli_fetch_assoc($result);


    $response = '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalEdit' . $dataPersentase['id'] . 'Label">
                Edit Data </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
            <form method="POST" action="edit_polres.php">
                <input type="hidden" name="id" value="' . $dataPersentase['id'] . '" />
                <div class="form-group mb-2">
                    <label style="font-weight:600;" for="exampleFormControlInput1">Polres</label>
                    <input type="text" class="form-control" value="' . $dataPersentase['Polres'] . '" name="Polres" readonly>
                </div>
                <div class="form-group mb-2">
                    <label style="font-weight:600;" for="exampleFormControlInput1">Persentase</label>
                    <input name="Persentase" type="text" class="form-control" value="' . $dataPersentase['Persentase'] . '">
                </div>
                <div class="form-group mb-2">
                    <label for="PG" style="font-weight:600;">Program Giat</label>
                    <!-- Select Options -->
                    <select name="PG" class="form-control" id="PG" class="form-select border-0 border-bottom">
                    <option value="A11" ' . ($dataPersentase["PG"] == "A11" ? "selected" : "") . '>A11</option>
                    <option value="A21" ' . ($dataPersentase["PG"] == "A21" ? "selected" : "") . '>A21</option>
                    <option value="A41" ' . ($dataPersentase["PG"] == "A41" ? "selected" : "") . '>A41</option>
                    <option value="C72" ' . ($dataPersentase["PG"] == "C72" ? "selected" : "") . '>C72</option>
                    <option value="C81" ' . ($dataPersentase["PG"] == "C81" ? "selected" : "") . '>C81</option>
                    <option value="C82" ' . ($dataPersentase["PG"] == "C82" ? "selected" : "") . '>C82</option>
                    <option value="D101" ' . ($dataPersentase["PG"] == "D101" ? "selected" : "") . '>D101</option>
                    <option value="D102" ' . ($dataPersentase["PG"] == "D102" ? "selected" : "") . '>D102</option>
                    <option value="D103" ' . ($dataPersentase["PG"] == "D103" ? "selected" : "") . '>D103</option>
                    <option value="D104" ' . ($dataPersentase["PG"] == "D104" ? "selected" : "") . '>D104</option>
                    <option value="D111" ' . ($dataPersentase["PG"] == "D111" ? "selected" : "") . '>D111</option>
                    <option value="D112" ' . ($dataPersentase["PG"] == "D112" ? "selected" : "") . '>D112</option>
                    <option value="D121" ' . ($dataPersentase["PG"] == "D121" ? "selected" : "") . '>D121</option>
                    <option value="D122" ' . ($dataPersentase["PG"] == "D122" ? "selected" : "") . '>D122</option>
                    <option value="E131" ' . ($dataPersentase["PG"] == "E131" ? "selected" : "") . '>E131</option>
                    <option value="E132" ' . ($dataPersentase["PG"] == "E132" ? "selected" : "") . '>E132</option>
                    <option value="E141" ' . ($dataPersentase["PG"] == "E141" ? "selected" : "") . '>E141</option>
                    <option value="E142" ' . ($dataPersentase["PG"] == "E142" ? "selected" : "") . '>E142</option>
                    <option value="E151" ' . ($dataPersentase["PG"] == "E151" ? "selected" : "") . '>E151</option>
                    <option value="E152" ' . ($dataPersentase["PG"] == "E152" ? "selected" : "") . '>E152</option>
                    <option value="G161" ' . ($dataPersentase["PG"] == "G161" ? "selected" : "") . '>G161</option>
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
        </form>
    </div>
</div>';

    echo $response;
} else {
    // Jika tidak ada data ditemukan, tampilkan pesan error atau tindakan lain yang sesuai
    echo "Data tidak ditemukan";
}
?>

