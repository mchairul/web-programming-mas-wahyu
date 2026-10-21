<?php
$namaSiswa = [
    'budi',
    'iwan',
    'andre'
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP HTML</title>
</head>
<body>
    <h1>Data Siswa</h1>
    <table>
        <tr>
            <th>No</th>
            <th>nama</th>
        </tr>
        <?php for ($i=0; $i < count($namaSiswa); $i++) { ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo $namaSiswa[$i] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>