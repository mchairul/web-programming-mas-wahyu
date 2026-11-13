<?php
include 'system/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .login-form {
            background-color: white;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 login-form mt-5 p-5">
                <h1>Login</h1>
                <form action="proses_login.php" method="post">

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <!-- jika cek flash ada tambah class is-invalid setelah form-control -->
                        <input type="text" name="username" id="username"
                            class="form-control <?php if (cekFlashSession('username')) { echo 'is-invalid'; } ?>"
                            placeholder="username"
                            required>
                            <div class="invalid-feedback">
                                <!-- jika cek session ada, maka ambil flash session dan tampilkan -->
                                <?php if (cekFlashSession('username')) { ?>

                                <p><?= ambilFlashSession('username') ?></p>
                                
                                <?php  } ?>
                            </div>
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control <?php if (cekFlashSession('password')) { echo 'is-invalid'; } ?>" 
                            placeholder="****" required>
                        <div class="invalid-feedback">
                            <!-- jika cek session ada, maka ambil flash session dan tampilkan -->
                            <?php if (cekFlashSession('password')) { ?>

                            <p><?= ambilFlashSession('password') ?></p>

                            <?php  } ?>
                        </div> 
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        // hapus class is-invalid ketika user mengetik di input username

        // variable element input dengan id username
        var elementInputUsername = document.getElementById('username');
        // event listener untuk elemet elementInputUsername
        elementInputUsername.addEventListener('input', function () {
            // hapus class di element
            elementInputUsername.classList.remove('is-invalid');
        });

        // hapus class is-invalid ketika user mengetik di input password
        var elementInputPassword = document.getElementById('password');
        elementInputPassword.addEventListener('input', function () {
            elementInputPassword.classList.remove('is-invalid');
        });
    </script>
</body>
</html>