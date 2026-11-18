<?php

include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = postData('id');

if ($id == '') {
    buatFlashSession('pesan_gagal', 'Invalid Request');
    header('Location: siswa.php');
    exit();
}

// pengecekan jika id tidak ada di table
$getData = mysqli_query($koneksi, "SELECT * FROM table_siswa WHERE id = '$id'");
if (mysqli_num_rows($getData) < 1) {
    buatFlashSession('pesan_gagal', 'Invalid Request');
    header('Location: siswa.php');
    exit();
}

$nisn = postData('nisn');
$nama = postData('nama');
$alamat = postData('alamat');

$validated = true;

if ($nisn == '') {
    $validated = false;
    buatFlashSession('nisn', 'Harap Isi NISN');
}

$cekNisn = mysqli_query($koneksi, "SELECT nisn FROM table_siswa WHERE nisn = '$nisn' AND id != '$id' ");

if (mysqli_num_rows($cekNisn) > 0) {
    $validated = false;
    buatFlashSession('nisn', 'NISN Sudah Ada');
}

if ($nama == '') {
    $validated = false;
    buatFlashSession('nama', 'Harap Isi Nama');
}

if ($alamat == '') {
    $validated = false;
    buatFlashSession('alamat', 'Harap Isi Alamat');
}

if (! $validated) {
    header("Location: ubah_siswa.php?id=$id");
    exit();
}

$query = "UPDATE table_siswa SET nisn = '$nisn', nama_siswa = '$nama', alamat = '$alamat' WHERE id = $id";
$ubahSiswa = mysqli_query($koneksi, $query);

// cek apakah ubah siswa berhasil
// jika berhasil
if ($ubahSiswa) {
    buatFlashSession('pesan_sukses', 'Ubah Siswa Berhasil');
} else {
    buatFlashSession('pesan_gagal', 'Ubah siswa gagal : ' . $koneksi->error);
}

header('Location: siswa.php');
