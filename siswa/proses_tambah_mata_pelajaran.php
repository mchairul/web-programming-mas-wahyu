<?php 
include 'system/koneksi.php';

if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$kode_mapel = postData('kode_mata_pelajaran');
$nama_mapel = postData('nama_mata_pelajaran');

$validated = true;

// kode mapel kosong atau karakter ''
if ($kode_mapel == '') {
    $validated = false;
    buatFlashSession('kode_mata_pelajaran','Kode mata pelajaran tidak boleh kosong');
}

$cekKodeMapel = mysqli_query($koneksi,"SELECT kode_mata_pelajaran FROM mata_pelajaran WHERE kode_mata_pelajaran = '$kode_mapel' ");

// cek jumlah baris dari hasil query
if (mysqli_num_rows($cekKodeMapel) > 0) {
    $validated = false;
    buatFlashSession('kode_mata_pelajaran', 'Kode mata pelajaran sudah ada');
}

// nama_mapel kosong atau karakter ''
if ($nama_mapel == ''){
    $validated = false;
    buatFlashSession('nama_mata_pelajaran','Nama Mata pelajaran tidak boleh kosong');
}

// cek jika nilai $validated = false
if (! $validated) {
    header('location: tambah_mata_pelajaran.php');
    exit();
}

$query = "INSERT INTO mata_pelajaran (kode_mata_pelajaran, nama_mata_pelajaran) 
VALUES ('$kode_mapel','$nama_mapel')";

$tambahMapel = mysqli_query($koneksi, $query);

header('Location: mata_pelajaran.php');