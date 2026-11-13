<?php
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

// baca data $_POST dan taruh ke variable
$nisn = postData('nisn');
$nama = postData('nama');
$alamat = postData('alamat');
$tgLahir = postData('tanggal_lahir');
//var_dump($tgLahir);exit();

// buat nilai awal tervalidasi sebagai true
$tervalidasi = true;

//cek kosong
if ($nisn == '') {
    // setiap valiadi gagal, ubah variable $tervalidasi menjadi false
    $tervalidasi = false;
    // buat flash session
    buatFlashSession('nisn', 'NISN tidak boleh kosong');
}

// cek nisn ke table siswa
$cekNisn = mysqli_query($koneksi, "SELECT nisn FROM table_siswa WHERE nisn = '$nisn' ");
// cek apakah jumlah nya lebih dari 0
if (mysqli_num_rows($cekNisn) > 0) {
    $tervalidasi = false;
    buatFlashSession('nisn', 'NISN sudah ada');
}

if ($nama == '') {
    $tervalidasi = false;
    buatFlashSession('nama', 'Nama tidak boleh kosong');
}

if ($alamat == '') {
    $tervalidasi = false;
    buatFlashSession('alamat', 'Alamat tidak boleh kosong');
}

if ($tgLahir == '') {
    $tervalidasi = false;
    buatFlashSession('tanggal_lahir', 'Tanggal Lahir tidak boleh kosong');
}

// validasi tanggal ada di file validation.php
$cekTanggal = cekTanggalValid($tgLahir, '2020-12-31');
if (! $cekTanggal) {
    $tervalidasi = false;
    buatFlashSession('tanggal_lahir', 'Isi Tanggal Lahir dengan benar');
}

// jika $tervalidasi memiliki nilai false
if (! $tervalidasi) {
    // pindah ke halaman siswa
    header('Location: tambah_siswa.php');
    // hentikan
    exit();
}

// variable string untuk query (supaya bisa dimanage)
$query = "INSERT INTO table_siswa (nisn, nama_siswa, alamat, tanggal_lahir) VALUES ('$nisn', '$nama', '$alamat', '$tgLahir') ";

// proses query insert data siswa 
$tambahSiswa = mysqli_query($koneksi, $query);

// pindah ke halaman siswa.php
header('Location: siswa.php');
