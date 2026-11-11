<?php
include 'partial/header.php';
include 'system/koneksi.php';

//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

// SELECT data siswa ditaruh ke dalam variable
$dataSiswa = mysqli_query($koneksi, "SELECT * FROM table_siswa");

?>

<div class="container">
    <h1>Siswa</h1>
    <a href="tambah_siswa.php" class="btn btn-primary">+ Tambah Siswa</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n = 1;
            while($siswa = mysqli_fetch_assoc($dataSiswa)) { ?>
            <tr>
                <td><?= $n ?></td>
                <td><?= $siswa['nisn'] ?></td>
                <td><?= $siswa['nama_siswa'] ?></td>
                <td><?= $siswa['alamat'] ?></td>
                <td><?= $siswa['tanggal_lahir'] ?></td>
                <td>
                    <a class="btn btn-warning" href="ubah_siswa.php?id=<?= $siswa['id'] ?>">Ubah</a>
                    <button type="button" class="btn btn-danger" onclick="hapusSiswa('<?= $siswa['id'] ?>')">Hapus</button>
                </td>
            </tr>
            <?php $n++; } ?>
        </tbody>
    </table>
    <button type="button" onclick="pindahKeFB()">Pindah ke FB</button>
</div>
<script>
    console.log(window);
    
    function hapusSiswa(id) {
        if (confirm('Apakah anda yakin ?')) {
            // pindah ke halaman hapus dengan parameter id
            window.location.href = 'hapus_siswa.php?id=' + id // di url
        }
    }

    function pindahKeFB() {
        window.location.href = 'https://facebook.com'
    }
</script>
<?php include 'partial/footer.php'; ?>