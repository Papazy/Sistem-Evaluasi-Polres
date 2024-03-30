<table class="table table-hover py-0" id="datatablesSimple">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">
                <center>Polres</center>
            </th>
            <th scope="col">
                <center>Periode</center>
            </th>
            <th scope="col">
                <center>PG</center>
            </th>
            <th scope="col">
                <center>Persentase</center>
            </th>
            <th scope="col">
                <center>Min</center>
            </th>
            <th scope="col">
                <center>Max</center>
            </th>
            <th scope="col">
                <center>Tw</center>
            </th>
            <th scope="col">
                <center>Setting</center>
            </th>
        </tr>
    </thead>

    <tbody>
        <?php

                            $no = 1;
                            $queryLaporan = mysqli_query($koneksi, "SELECT * FROM laporan_polres");
                            while ($data = mysqli_fetch_array($queryLaporan)) {
                                $queryPersentase = mysqli_query($koneksi, "SELECT * FROM persentase_polres WHERE Periode = '{$data['Periode']}' AND PG = '{$data['PG']}'");
                                while ($dataPersentase = mysqli_fetch_array($queryPersentase)) {
                                    $class = null;
                                    if((float)$dataPersentase['Persentase'] >= (float) $data["Max"]){
                                        $class = 'bg-success';
                                    }elseif((float)$dataPersentase['Persentase'] > (float) $data["Min"]){
                                        $class = 'bg-warning';
                                    }else{
                                        $class = 'bg-danger';

                                    }
                            ?>
        <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><?= $dataPersentase['Polres'] ?></td>
            <td>
                <center><?= $data['Periode'] ?></center>
            </td>
            <td>
                <center><?= $data['PG'] ?></center>
            </td>
            <td style="padding:0; margin:0">
                <center class="<?= $class ?>" style="width:100%; height:100%; margin:0;">
                    <?= $dataPersentase['Persentase'] . "%" ?></center>
            </td>
            <td>
                <center><?= $data['Min'] . "%" ?></center>
            </td>
            <td>
                <center><?= $data['Max'] . "%" ?></center>
            </td>
            <td>
                <center><?= $data['Triwulan'] ?></center>
            </td>
            <td>
                <a href="" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen" title="Edit"></i> Edit</a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash" title="Delete"></i> Delete</a>
            </td>
        </tr>

        <?php }
                            } ?>
    </tbody>

</table>