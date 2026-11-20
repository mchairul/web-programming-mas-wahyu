<?php
include 'system/koneksi.php';
include 'partial/header.php';

//cek session
if (! isset($_SESSION['id']) || ! isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$perHalaman = 3;
// cek halaman
if (isset($_GET['halaman'])) {
    //          cast ke int
    $halaman = (int) $_GET['halaman']; 
} else {
    $halaman = 1;
}

$previous = $halaman - 1;
$next = $halaman + 1;

// cek offset
if ($halaman > 1) {
    $offset = ($halaman * $perHalaman) - $perHalaman;
} else {
    $offset = 0;
}

// mendapatkan jumlah data
$getTotalData = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM table_siswa");
$rowTotalData = mysqli_fetch_assoc($getTotalData);
$totalData = $rowTotalData['jumlah'];

$totalHalaman = ceil($totalData / $perHalaman); // total hasil pembulatan ke atas

// SELECT data siswa ditaruh ke dalam variable
$dataSiswa = mysqli_query($koneksi, "SELECT * FROM table_siswa LIMIT $perHalaman OFFSET $offset");

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
            // set $n dari nilai offset lalu ditambah 1 (Penomoran)
            $n = $offset + 1;
            while($siswa = mysqli_fetch_assoc($dataSiswa)) { ?>
            <tr>
                <td><?= $n ?></td>
                <td><?= xssClean($siswa['nisn']) ?></td>
                <td><?= xssClean($siswa['nama_siswa']) ?></td>
                <td><?= xssClean($siswa['alamat']) ?></td>
                <td><?= xssClean($siswa['tanggal_lahir']) ?></td>
                <td>
                    <a class="btn btn-warning" href="ubah_siswa.php?id=<?= $siswa['id'] ?>">Ubah</a>
                    <button type="button" class="btn btn-danger" onclick="hapusSiswa('<?= $siswa['id'] ?>')">Hapus</button>
                </td>
            </tr>
            <?php $n++; } ?>
        </tbody>
    </table>
    <nav aria-label="...">
        <ul class="pagination">
            <!-- jika halaman 1 tombol prev akan didisabled -->
            <li class="page-item <?php if ($halaman == 1) { echo 'disabled'; } ?>">
                <a href="?halaman=<?= $previous ?>" class="page-link">
                    Previous
                </a>
            </li>

            <?php for ($i = 1; $i <= $totalHalaman; $i++) { ?>

            <li class="page-item <?php if($halaman == $i) { echo 'active'; } ?>">
                <a class="page-link" href="?halaman=<?= $i ?>">
                    <?= $i ?>
                </a>
            </li>

            <?php } ?>

            <!-- jika halaman = $totalHalaman tombol prev akan didisabled -->
            <li class="page-item <?php if ($halaman == $totalHalaman) { echo 'disabled'; } ?>">
                <a class="page-link" href="?halaman=<?= $next ?>">
                    Next
                </a>
            </li>
        </ul>
    </nav>
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