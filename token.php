<?php

$apiKey = '4da75716674e3d59cc59a567099e80a8';
$secretKey = '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';
$parameters = $_GET;
$shop_url = $parameters['shop'];
$hmac = $parameters['hmac'];
$parameters = array_diff_key($parameters, array('hmac' => ''));
ksort($parameters);

$newHmac =  hash_hmac('sha256', http_build_query($parameters), $secretKey);

if (hash_equals($hmac, $newHmac)) {
    $access_token_endpoint = "https://" . $shop_url . '/admin/oauth/access_token';
    // Prepare POST data
    $data = array(
        'client_id' => $apiKey,
        'client_secret' => $secretKey,
        'code' => $parameters['code']
    );

    // Make the POST request using cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $access_token_endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, count($data));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($ch);
    curl_close($ch);

    $finalResponse = json_decode($result, true);
    echo print_r ($finalResponse);

} else {
    echo 'This is may be hacked';
}


