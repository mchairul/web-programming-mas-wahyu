<?php
include 'partial/header.php';
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$dataFoto = mysqli_query($koneksi, "SELECT * FROM foto_siswa WHERE id = $id");
$foto = mysqli_fetch_assoc($dataFoto);

// ambil semua data siswa untuk tag html select
$dataSiswa = mysqli_query($koneksi, "SELECT * FROM table_siswa");

?>

<div class="container">
    <h1>Ubah Informasi Foto</h1>
    <form action="proses_ubah_foto.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $foto['id'] ?>">
        <div class="mb-3">
            <label for="id_siswa_id">Siswa</label>
            <select name="post_ubah_siswa" id="id_siswa_id" class="form-select" required>
                <option value="">-- Pilih Siswa --</option>
                <?php while ($siswa = mysqli_fetch_assoc($dataSiswa)) { ?>
                <option value="<?= $siswa['id']?>" <?php if($siswa['id'] == $foto['id_siswa']) { echo 'selected';};?>>
                    <?= $siswa['nisn'] ?> - <?= $siswa['nama_siswa'] ?>
                </option>
                <?php } ?>

            </select>
        </div>
        <div class="mb-3">
            <img src="uploads/<?= $foto['file_foto'] ?>" alt="" width="150"><br>
            <label for="id_foto_id">File Foto Siswa</label>
            <input type="file" name="post_ubah_foto" id="id_foto_id" class="form-control">
        </div>
        <div class="mb-3">
            <label for="id_keterangan">Keterangan</label>
            <textarea name="post_ubah_keterangan" id="id_keterangan" class="form-control" placeholder="Input keterangan"><?= $foto['keterangan'] ?></textarea>
        </div>
        <div class="mb-3">
            <a href="foto.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Ubah Foto</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>