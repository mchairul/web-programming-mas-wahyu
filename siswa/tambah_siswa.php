<?php
include 'partial/header.php';
include 'system/koneksi.php';
?>

<div class="container">
    <h1>Tambah Siswa</h1>

    <form action="proses_tambah_siswa.php" method="post">
        <div class="mb-3">
            <label for="id_nisn">NISN</label>
            <input type="text" name="nisn" id="id_nisn" class="form-control" placeholder="Input NISN" required>
        </div>
        <div class="mb-3">
            <label for="id_nama">Nama</label>
            <input type="text" name="nama" id="id_nama" class="form-control" placeholder="Input Nama" required>
        </div>
        <div class="mb-3">
            <label for="id_alamat">Alamat</label>
            <textarea name="alamat" id="id_alamat" class="form-control" placeholder="Input Alamat" required></textarea>
        </div>

        <div class="mb-3">
            <label for="id_tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="id_tanggal_lahir" class="form-control" placeholder="Input Tgl Lahir" required>
        </div>

        <div class="mb-3">
            <a href="siswa.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
    </form>
</div>

<?php include 'partial/footer.php'; ?>