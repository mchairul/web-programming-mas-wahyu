<?php
define('CSRF_TOKEN_NAME', '_token');

function getCsrfName(): string
{
    return CSRF_TOKEN_NAME;    
}

function buatCsrfToken(): void
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

// MENJAGA CSRF TOKEN
// setiap request post akan divalidasi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // jika post name _token tidak ada
    if (! isset($_POST[CSRF_TOKEN_NAME])) {
        // arahkan ke halaman error
        header('Location: error.php');
        exit();
    }

    // jika post name _token tidak sama dengan $_SESION['csrf_token']
    if ($_POST[CSRF_TOKEN_NAME] != $_SESSION['csrf_token']) {
        // arahkan ke halaman error
        header('Location: error.php');
        exit();
    }
}


function xssClean(string $teksTampil): string
{
    $teksTampil = trim($teksTampil);
    $teksTampil = htmlentities($teksTampil);
    return $teksTampil;
}
