<?php
require_once __DIR__ . '/koneksi.php';

$idKaryawan = $_POST['karyawan_id'];

$hariIni = date('Y-m-d');
$sekarang = date('Y-m-d H:i:s');

$query = "SELECT * FROM absen WHERE karyawan_id = '$idKaryawan' AND tanggal = '$hariIni'";
$getKaryawanHariIni = mysqli_query($koneksi, $query);
$jumlahBaris = mysqli_num_rows($getKaryawanHariIni);

// cek jika yang ditekan tombol absen masuk
if (isset($_POST['absen_masuk'])) {
    // jika belum absen, 
    if($jumlahBaris < 1) {
        $query = "INSERT INTO absen (karyawan_id, tanggal, jam_masuk) VALUES ('$idKaryawan', '$hariIni', '$sekarang')";
        $absen = mysqli_query($koneksi, $query);
        $_SESSION['pesan_sukses'] = 'Berhasil Absen Masuk';
    } else {
        $_SESSION['pesan_gagal'] = 'Anda Sudah Absen Masuk';
    }
}

if (isset($_POST['absen_keluar'])) {
    // cek absen masuk
    // jika belum ada , dianggap belum absen
    if($jumlahBaris < 1) {
        $_SESSION['pesan_gagal'] = 'Harap Absen Masuk Dahulu';
    } else {
        $dataAbsen = mysqli_fetch_assoc($getKaryawanHariIni);
        
        // cek jika belum absen keluar
        if (is_null($dataAbsen['jam_keluar'])) {
            $id = $dataAbsen['id'];
            $query = "UPDATE absen SET jam_keluar = '$sekarang' WHERE id = '$id'";
            $absen = mysqli_query($koneksi, $query);
            $_SESSION['pesan_sukses'] = 'Berhasil Absen Keluar';
        } else {
            $_SESSION['pesan_gagal'] = 'Anda Sudah Absen Keluar';
        }
    }
}

header('Location: index.php');
exit;

