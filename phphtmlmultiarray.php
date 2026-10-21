<?php
$gajiPerJam = 10000;
$multiArray = [
    [
        'nik' => '123ABC',
        'nama' => 'budi',
        'jam-kerja' => [
            'senin' => 8,
            'selasa' => 8,
            'rabu' => 8,
            'kamis' => 10,
            'jumat' => 8
        ]
    ],
    [
        'nik' => '456DEF',
        'nama' => 'iwan',
        'jam-kerja' => [
            'senin' => 0,
            'selasa' => 10,
            'rabu' => 8,
            'kamis' => 8,
            'jumat' => 0
        ]
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Jam Kerja Mingguan</h1>
    <table width="60%" border="1">
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Total Jam Kerja</th>
            <th>Gaji</th>
        </tr>

        <?php for ($i=0; $i < count($multiArray); $i++) { ?>

        <tr>
            <td><?php echo $multiArray[$i]['nik'] ?></td>
            <td><?php echo $multiArray[$i]['nama'] ?></td>
            <td>
                <?php
                $totalJamKerja = $multiArray[$i]['jam-kerja']['senin'] + $multiArray[$i]['jam-kerja']['selasa']
                + $multiArray[$i]['jam-kerja']['rabu'] + $multiArray[$i]['jam-kerja']['kamis']
                + $multiArray[$i]['jam-kerja']['jumat'];
                echo $totalJamKerja;
                ?>
            </td>
            <td>
                <?php echo $totalJamKerja * $gajiPerJam; ?>
            </td>
        </tr>

        <?php } ?>

    </table>
</body>
</html>