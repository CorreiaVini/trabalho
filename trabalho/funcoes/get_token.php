<?php

    include('./inc/appVariables.php');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url_token);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials' ); 
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:x.x.x) Gecko/20041107 Firefox/x.x");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     
    $json = curl_exec($ch);
    $json = json_decode($json);
    curl_close($ch);

    return $json->access_token;

?>