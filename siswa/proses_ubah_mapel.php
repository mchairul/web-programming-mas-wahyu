<?php
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_POST['id'];

$kode_mapel = postData('kode_mata_pelajaran');
$nama_mapel = postData('nama_mata_pelajaran');

$validated = true;

if ($kode_mapel == '') {
    $validated = false;
    buatFlashSession('kode_mata_pelajaran', 'Kode mata pelajaran tidak boleh kosong');
}

$cekKodeMapel = mysqli_query($koneksi, "SELECT kode_mata_pelajaran FROM mata_pelajaran
    WHERE kode_mata_pelajaran = '$kode_mapel' AND id != '$id'
    ");

if (mysqli_num_rows($cekKodeMapel) > 0) {
    $validated = false;
    buatFlashSession('kode_mata_pelajaran', 'Kode mata pelajaran sudah ada');
}

if ($nama_mapel == '') {
    $validated = false;
    buatFlashSession('nama_mata_pelajaran', 'Nama mata pelajaran tidak boleh kosong');
}

if (!$validated) {
    header('Location: ubah_mata_pelajaran.php?id=' . $id);
    exit;
}

$query = "UPDATE mata_pelajaran SET kode_mata_pelajaran = '$kode_mapel',
          nama_mata_pelajaran = '$nama_mapel' WHERE id = '$id' ";

$ubahMapel = mysqli_query($koneksi, $query);

header('Location: mata_pelajaran.php');
