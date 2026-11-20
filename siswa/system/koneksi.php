<?php
// konfigurasi session
session_set_cookie_params([
    'lifetime' => 0, // 0 berarti unlimited (sampai browser ditutup) satuan detik
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => false, // ketika sudah https ubah ke true
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

session_regenerate_id(true);

//                          host        user    pass    db_name
$koneksi = mysqli_connect('localhost', 'root', 'root', 'sekolah_mas_wahyu');
//var_dump($koneksi);

// cek error
if ($koneksi->connect_error) {
    die('koneksi gagal' . $koneksi->connect_error);
}

include 'security.php';
include 'validation.php';
