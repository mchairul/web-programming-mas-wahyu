<?php
include 'partial/header.php';
include 'system/koneksi.php';
$id = $_GET['id'];

$mataPelajaran = mysqli_query($koneksi,"SELECT * FROM mata_pelajaran WHERE id = $id");

$row = mysqli_fetch_assoc($mataPelajaran);
?>

<div class="container">
    <h1>Ubah Mata Pelajaran</h1>
    <br>
    <form action="proses_ubah_mapel.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="mb-3">
                <label for="id_kode_mapel">Kode Mata Pelajaran</label>
                <input type="text" 
                    name="kode_mata_pelajaran" 
                    id="id_kode_mapel" 
                    class="form-control"
                    value="<?= $row['kode_mata_pelajaran']?>" 
                    placeholder="Input Kode Mata Pelajaran" required>
            </div>
            <div class="mb-3">
                <label for="id_nama_mapel">Nama Mata Pelajaran</label>
                <input type="text"
                    name="nama_mata_pelajaran"
                    id="id_nama_mapel"
                    class="form-control"
                    value="<?=  $row['nama_mata_pelajaran'] ?>"
                    placeholder="Input Nama Mata Pelajaran" required>
            </div>
            <div class="mb-3">
                <a href="mata_pelajaran.php" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-success">Ubah</button>
            </div>
    </form>
</div>
<?php include 'partial/footer.php'?>