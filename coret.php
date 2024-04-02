<?php

require_once "config.php";
require_once "utils.php";

$polres_merah = 0;
$polres_kuning = 0;
$polres_hijau = 0;
// $polres_merah = cariJumlahPolresMerah();
// $polres_kuning = cariJumlahPolresKuning();
// $polres_hijau = cariJumlahPolresHijau();

$polda_merah = 0;
$polda_kuning = 0;
$polda_hijau = 0;

$polda_merah = cariJumlahPoldaMerah();
// $polda_kuning = cariJumlahPoldaKuning();
// $polda_hijau = cariJumlahPoldaHijau();

print_r( '$polres_hijau ' );
print_r( $polres_hijau );
print_r( '<br>$polres_kuning ' );
print_r( $polres_kuning );
print_r( '<br>$polres_merah ' );
print_r( $polres_merah );

print_r( '<br>$polda_hijau ' );
print_r( $polda_hijau );
print_r( '<br>$polda_kuning ' );
print_r( $polda_kuning );
print_r( '<br>$polda_merah ' );
print_r( $polda_merah );

?>