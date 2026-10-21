<?php
$nilai = 100;
$syaratLulus = 90;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($nilai >= $syaratLulus) { ?>

        <h1 style="color: green">Selamat anda LULUS!</h1>
        <p>jangan lupa ambil raport nya</p>

    <?php } else { ?>

        <h1 style="color: red">maaf anda tidak LULUS!</h1>
        <p>silahkan coba lagi</p>

    <?php } ?>

    <%  %>
</body>
</html>