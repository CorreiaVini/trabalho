<?php
    // include('./inc/appVariables.php');

    $host = 'viaduct.proxy.rlwy.net';
    $port = 56398; 
    $database = 'railway';
    $username = 'root';
    $password = 'E54hgfE65f-ccAd4c-aD5BD3h5-C1f52';

    try {
        $dsn = "mysql:host=$host;port=$port;dbname=$database";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexão estabelecida com sucesso!";
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
?>
