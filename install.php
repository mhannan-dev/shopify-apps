<?php


$apiKey = '4da75716674e3d59cc59a567099e80a8';


$ngrok_url = 'https://5f0c-103-120-36-135.ngrok-free.app';


$scopes = 'read_products,write_products,read_orders,write_orders';

$shop = $_GET['shop'];

$redirect_uri = $ngrok_url . '/shopify-magic/token.php';

$nonce = bin2hex(random_bytes(12));

$ACCESS_MODE = 'per-user';


$oauth_url = 'https://' . $shop . '/admin/oauth/authorize?client_id=' . $apiKey . 
'&scope=' . $scopes . '&redirect_uri=' . urlencode($redirect_uri) . '&state=' . $nonce;

header("Location: " . $oauth_url);
exit();


// $oauth_url = "https://YOUR_SHOP_NAME.myshopify.com/admin/oauth/authorize?client_id=
//     {$api_key}&scope={$scopes}&redirect_uri={$redirect_uri}&state={$state}";
