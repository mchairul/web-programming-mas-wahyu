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
    <h1>Tambah Siswa</h1>

    <form action="proses_tambah_siswa.php" method="post">
        <div class="mb-3">
            <label for="id_nisn">NISN</label>
            <input type="text" name="nisn" id="id_nisn"
                class="form-control <?php if(cekFlashSession('nisn')) { echo 'is-invalid'; } ?>"
                placeholder="Input NISN"
                required>
            <div class="invalid-feedback">
                <?php if (cekFlashSession('nisn')) { ?>
                <?= ambilFlashSession('nisn') ?>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="id_nama">Nama</label>
            <input type="text" name="nama" id="id_nama"
                class="form-control <?php if(cekFlashSession('nama')) { echo 'is-invalid'; } ?>"
                placeholder="Input Nama" required>
            <div class="invalid-feedback">
                <?php if (cekFlashSession('nama')) { ?>
                <?= ambilFlashSession('nama') ?>
                <?php } ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="id_alamat">Alamat</label>
            <textarea name="alamat" id="id_alamat"
                class="form-control <?php if(cekFlashSession('alamat')) { echo 'is-invalid'; } ?>"
                placeholder="Input Alamat" required></textarea>
            <div class="invalid-feedback">
                <?php if (cekFlashSession('alamat')) { ?>
                <?= ambilFlashSession('alamat') ?>
                <?php } ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="id_tanggal_lahir">Tanggal Lahir <small>maksimum kelahiran 31 Desember 2020</small></label>
            <input type="date" name="tanggal_lahir" id="id_tanggal_lahir"
                class="form-control <?php if(cekFlashSession('tanggal_lahir')) { echo 'is-invalid'; } ?>"
                placeholder="Input Tgl Lahir" required>
            <div class="invalid-feedback">
                <?php if (cekFlashSession('tanggal_lahir')) { ?>
                <?= ambilFlashSession('tanggal_lahir') ?>
                <?php } ?>
            </div>
        </div>

        <div class="mb-3">
            <a href="siswa.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>