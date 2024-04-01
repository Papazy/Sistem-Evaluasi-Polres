<table class="table table-hover py-0" id="datatablesSimple">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">
                <center>Polres</center>
            </th>
            
            <th scope="col">
                <center>Persentase</center>
            </th>
            
            <th scope="col">
                <center>Setting</center>
            </th>
        </tr>
    </thead>

    <tbody>
        <?php

                            $no = 1;
                            // var_dump($POLRES_ALL);
                            foreach($POLRES_ALL as $satuan){
                                // var_dump('$satuan');
                                // var_dump($satuan);
                                $queryPersentase = mysqli_query($koneksi, "SELECT persentase FROM persentase_polres WHERE Polres = '{$satuan}' AND Triwulan = '{$TRIWULAN_SELECTED}'");
                                $persen = 0;
                                $count = 0;
                                while($dataPersentase = mysqli_fetch_array($queryPersentase)){
                                    $persen += $dataPersentase['persentase'];
                                    $count++;
                                }
                                $persen = $persen / $count;

                            ?>
        <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><?= $satuan ?></td>
            
            <td style="padding:0; margin:0">
                <center class="<?= $class ?>" style="width:100%; height:100%; margin:0;">
                    <?= $persen . "%" ?></center>
            </td>
            <td><center>
            <a href="<?php echo $main_url; ?>table/data.php?q=<?=$satuan?>&triwulan=<?= $TRIWULAN_SELECTED ?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Show</a></td>
                            </center>
            </td>
        </tr>

        <?php } ?>
    </tbody>

</table>