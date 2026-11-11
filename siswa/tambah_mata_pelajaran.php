<?php
include 'partial/header.php';
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>

<div class="container">
    <h1>Tambah Pelajaran</h1>

    <form action="proses_tambah_mata_pelajaran.php" method="post">
        <div class="mb-3">
            <label for="id_kode_mapel">Kode Mata Pelajaran</label>
            <input type="text" 
                name="kode_mata_pelajaran" 
                id="id_kode_mapel"
                class="form-control"
                placeholder="Input Kode Mata Pelajaran di sini" 
                required>
        </div>
        <div class="mb-3">
            <label for="id_nama_mapel">Nama Mata Pelajaran</label>
            <input type="text" 
                name="nama_mata_pelajaran"
                id="id_nama_mapel"
                class="form-control"
                placeholder="Input Nama Mata Pelajaran di dini"
                required>
        </div>
        <div class="mb-3">
            <a href="mata_pelajaran.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Tambah Mata Pelajaran</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php';?>