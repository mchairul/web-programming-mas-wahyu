<?php

include 'file_include_2.php';

$hasilPenjumlahan = penambahan(100, 300);

$a = tampilLayar($hasilPenjumlahan);
var_dump($a);

echo '<br>';
tampilLayar(pengurangan(100, 50));

echo '<br>';
tampilLayar(hitungGaji(8));
