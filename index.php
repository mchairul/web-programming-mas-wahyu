<?php
// ini komentar 1 baris

/*
  ini komentar
  lebih dari 1
  baris
 */

// variable dengan $
$nama = 'budi';


// string
$alamat = 'jakarta';

//echo '<p>halo, nama saya ' . $nama . ' alamat saya di ' . $alamat . '</p>';
//echo "<p>halo, saya $nama alamat saya di $alamat </p>";


// integer
$a = 1;
$b = 2;
//echo $a + $b;

// float
$c = 3.14;
$d = 9.99;
//echo $b + $nama;

$nama = 'iwan';
//var_dump($nama);


// array

// array index
$mobil = ['honda', 'toyota', 'suzuki'];
//var_dump($mobil);
//echo $mobil[0];

// array key
$nilaiSiswa = [
    'budi' => 100,
    'iwan' => 90,
    'andre' => 70
];
//var_dump($nilaiSiswa);
//echo $nilaiSiswa['budi'];

// array multidimensi
$dataNilaiSiswa = [
    [
        'nama' => 'budi',
        'nilai' => [
            'matematika' => [88,77],
            'englist' => [99, 66]
        ]
    ],
    [
        'nama' => 'iwan',
        'nilai' => [
            'matematika' => [66, 99],
            'englist' => [99, 67]
        ]
    ]
];
//var_dump($dataNilaiSiswa[1]['nilai']['matematika'][0]);


//object
// conton dari string json
$data = '{"nama":"budi","alamat":"jakarta"}';
$json = json_decode($data);
//var_dump($json->nama);


$hari = 'senin';

if ($hari == 'senin') {
    echo 'upacara';
} else {
    echo 'tidak upacara';
}
?>
