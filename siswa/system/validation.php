<?php
define('FLASH_PREFIX', 'FLASH_');

// trim data dari $_POST
function postData(string $nama): string
{
    // jika ada key dengan $nama di $_POST
    if (isset($_POST[$nama])) {
        // return post data yang sudah ditrim
        return trim($_POST[$nama]);
    }

    return '';
}

// membuat session flash
function buatFlashSession(string $nama, string $isi): void
{
    $_SESSION[FLASH_PREFIX . $nama] = $isi;
}

// mengecek session flash
function cekFlashSession(string $nama): bool
{
    if (isset($_SESSION[FLASH_PREFIX . $nama])) {
        return true;
    }

    return false;
}

// mendapatkan session flash
function ambilFlashSession(string $nama): string
{
    if (isset($_SESSION[FLASH_PREFIX . $nama])) {
        // taruh nilai SESSION dengan name ke variable pesan
        $pesan = $_SESSION[FLASH_PREFIX . $nama];
        // hapus session dengan key $nama
        unset($_SESSION[FLASH_PREFIX . $nama]);

        return $pesan;
    }

    return '';
}

function cekTanggalValid(string $tanggal, $maksimumTanggal = '', $format = 'Y-m-d'): bool
{
    // cek jika nilai $maksimumTanggal kosong
    if ($maksimumTanggal == '') {
        // set $maksimumTanggal adalah hari ini
        $maksimumTanggal = date('Y-m-d');
    }

    // buat variable $t dari input user dengan format berdasarkan $format
    $t = DateTime::createFromFormat($format, $tanggal);

    // cek apakah $t nilai nya true atau tidak false
    if ($t) {
        //pengecek maksimal tanggal
        $tgl = new DateTime($tanggal);
        $tglMax = new DateTime($maksimumTanggal);
        if ($tgl > $tglMax) {
            return false;
        }
        return true;
    }

    return false;
}
