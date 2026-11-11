<?php

include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

// baca post data
$idMapel = $_POST['post_id_mapel'];
$keterangan = $_POST['post_keterangan'];

// baca post file
$fileUpload = $_FILES['post_file'];
//var_dump($fileUpload); // untuk menampilkan isi array $_FILES
//exit; // hentikan eksekusi sementara untuk melihat isi array $_FILES

// tentukan lokasi upload
$tujuanUpload = 'uploads/';
$namaFile = $fileUpload['name'];

//  pindahkan file dari lokasi sementara ke lokasi tujuan
//             /Applications/MAMP/tmp/php/phpDlcCtu -> uploads/wehz m why.xlsx
$upload = move_uploaded_file($fileUpload['tmp_name'], $tujuanUpload . $namaFile);

$query = "INSERT INTO modul_mata_pelajaran (id_mata_pelajaran, nama_file, keterangan) VALUES ('$idMapel', '$namaFile', '$keterangan')";
$tambahModul = mysqli_query($koneksi, $query);

header('Location: modul.php');
