<?php
include 'partial/header.php';
include 'system/koneksi.php';
//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$dataSiswa = mysqli_query($koneksi, "SELECT * FROM table_siswa");
?>

<div class="container">
    <h1>Tambah Foto</h1>
      <form action="proses_tambah_foto.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="id_foto">Pilih Siswa</label>
            <select name="post_id_foto" id="id_foto" class="form-select" required>
                <option value="">-- Pilih ID Siswa --</option>
                <?php while($siswa = mysqli_fetch_assoc($dataSiswa)) { ?>
                <option value="<?= $siswa['id'] ?>">
                    <?= $siswa['nisn'] ?> - <?= $siswa['nama_siswa'] ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_file_foto">File Foto Siswa</label>
            <input type="file" name="post_file_foto" id="id_file_foto" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_keterangan">Keterangan</label>
            <textarea name="post_keterangan" id="id_keterangan" class="form-control" placeholder="Input keterangan"></textarea>
        </div>

        <div class="mb-3">
            <a href="foto.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php';?>