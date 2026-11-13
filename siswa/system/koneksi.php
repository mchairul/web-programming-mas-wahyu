<?php
session_start();

//                          host        user    pass    db_name
$koneksi = mysqli_connect('localhost', 'root', 'root', 'sekolah_mas_wahyu');
//var_dump($koneksi);

// cek error
if ($koneksi->connect_error) {
    die('koneksi gagal' . $koneksi->connect_error);
}

include 'validation.php';
