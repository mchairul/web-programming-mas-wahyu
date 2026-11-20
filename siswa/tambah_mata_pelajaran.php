<?php
include 'system/koneksi.php';
include 'partial/header.php';

//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>

<div class="container">
    <h1>Tambah Mata Pelajaran</h1>

    <form action="proses_tambah_mata_pelajaran.php" method="post">
        <input type="hidden" name="<?= getCsrfName() ?>" value="<?= getCsrfToken() ?>">
        <div class="mb-3">
            <label for="id_kode_mapel">Kode Mata Pelajaran</label>
            <input type="text" 
                name="kode_mata_pelajaran" 
                id="id_kode_mapel"
                class="form-control <?php if(cekFlashSession('kode_mata_pelajaran')) { echo 'is-invalid'; } ?>"
                placeholder="Input Kode Mata Pelajaran di sini" 
                required>
            <div class="invalid-feedback">
                <?php if (cekFlashSession('kode_mata_pelajaran')) { ?>
                <?= ambilFlashSession('kode_mata_pelajaran') ?>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="id_nama_mapel">Nama Mata Pelajaran</label>
            <input type="text" 
                name="nama_mata_pelajaran"
                id="id_nama_mapel"
                class="form-control <?php if (cekFlashSession('nama_mata_pelajaran')) {echo 'is-invalid';} ?>"
                placeholder="Input Nama Mata Pelajaran di dini"
                required>
            <div class="invalid-feedback">
                <?php if (cekFlashSession('nama_mata_pelajaran')) { ?>
                <?= ambilFlashSession('nama_mata_pelajaran') ?>
            <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <a href="mata_pelajaran.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Tambah Mata Pelajaran</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php';?>