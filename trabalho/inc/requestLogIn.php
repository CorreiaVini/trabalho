<?php
include('appVariables.php');

require_once "requests.php";


$app = "../index.php";
$submit_post_fields = 'grant_type=authorization_code&code=' . $_GET['code'];
$submit_post_fields .= "&redirect_uri=https://trabalho-php-production.up.railway.app/inc/callback.php";

$access_token = "Basic " . base64_encode("$client_id:$client_secret");

$used_token_data = post_request($url_token, $submit_post_fields, $access_token);


session_start();
echo gettype($used_token_data);
$_SESSION['spotify_token'] = $used_token_data;
header("Location: $app");
?>