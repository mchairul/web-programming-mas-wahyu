<?php
//                          host        user    pass    db_name
$koneksi = mysqli_connect('localhost', 'root', 'root', 'sekolah');
//var_dump($koneksi);

// cek error
if ($koneksi->connect_error) {
    die('koneksi gagal' . $koneksi->connect_error);
}
