<style>
    th, td {
    white-space: nowrap;
}
</style>
<table class="display" id="exampleNoSetting" style="width:80%">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">
                <center>Polres</center>
            </th>
            
            <th scope="col">
                <center style="width:20%">Persentase</center>
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
                                $queryPersentase = mysqli_query($koneksi, "SELECT persentase FROM persentase_polres WHERE Polres = '{$satuan}' AND Periode = '{$periode_select}'");
                                
                                $persen = 0;
                                $count = 0;
                                while($dataPersentase = mysqli_fetch_array($queryPersentase)){
                                    $persen += $dataPersentase['persentase'];
                                    $count++;
                                }
                                if($count > 0){
                                    $persen = $persen / $count;
                                }else{
                                    $persen = 0;
                                }

                                $class = null;
                                if($persen >= $Max){
                                    $class = 'bg-success';
                                }elseif($persen > $Min ){
                                    $class = 'bg-warning';
                                }else{
                                    $class = 'bg-danger';

                                }

                            ?>
        <tr>
            <td class="dt-type-numeric"></td>
            <td><?= $satuan ?></td>
            
            <td class="<?= $class ?>">
                <center >
                    <?= $persen . "%" ?></center>
            </td>
            <td><center>
            <a href="<?php echo $main_url; ?>table/data-periode.php?q=<?=$satuan?>&periode=<?= $periode_select?>&triwulan=<?= $TRIWULAN_SELECTED ?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Show</a></td>
                            </center>
            </td>
        </tr>

        <?php } ?>
    </tbody>

</table>