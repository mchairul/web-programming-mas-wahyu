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
function buatFlashSession(string $keySession, string $isi): void
{
    $_SESSION[FLASH_PREFIX . $keySession] = $isi;
}

// mengecek session flash
function cekFlashSession(string $keySession): bool
{
    // jika ada session dengan name $nama
    if (isset($_SESSION[FLASH_PREFIX . $keySession])) {
        return true;
    }

    return false;
}

// mendapatkan session flash
function ambilFlashSession(string $keySession): string
{
    if (isset($_SESSION[FLASH_PREFIX . $keySession])) {
        // taruh nilai SESSION dengan name ke variable pesan
        $pesan = $_SESSION[FLASH_PREFIX . $keySession];
        // hapus session dengan key $nama
        unset($_SESSION[FLASH_PREFIX . $keySession]);

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

//Tambah_Ubah_Mata_Pelajaran
function postMapel(string $kode_mapel): string {
    if (isset($_POST[$kode_mapel])) {
        return trim($_POST[$kode_mapel]);
    }
    return '';
}

function buatMapelSession(string $kode_mapel, string $isi): void {
    $_SESSION[FLASH_PREFIX . $kode_mapel] = $isi;
}


function cekMapelSession(string $kode_mapel): bool {
    if (isset($_SESSION[FLASH_PREFIX . $kode_mapel])) {
        return true;
    }
    return false;
}

function ambilMapelSession(string $kode_mapel): string {
    if (isset($_SESSION[FLASH_PREFIX . $kode_mapel])) {
        $info = $_SESSION[FLASH_PREFIX . $kode_mapel];
        unset($_SESSION[FLASH_PREFIX . $kode_mapel]);

        return $info;
    }

    return '';
}
