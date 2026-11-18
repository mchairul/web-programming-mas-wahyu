<?php

function buatCsrfToken()
{
    // jika session csrf_token belum ada
    if (! isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = password_hash(uniqid(), PASSWORD_DEFAULT);
    }
}

//langsung panggil function
buatCsrfToken();

function getCsrfToken(): string
{
    return $_SESSION['csrf_token'];
}


// setiap request post akan divalidasi
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // jika post name _token tidak ada
//     if (! isset($_POST['_token'])) {
//         die('Tidak ada token');
//     }
// }
