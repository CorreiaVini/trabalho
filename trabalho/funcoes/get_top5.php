<?php
    // lista as top 5 musicas da playlist top 50 brasil spotify
    // Obtém o token
    $token = include("get_token.php");

    //Faz a requisição a api 
    require_once "./inc/requests.php";

    $dados = get_request($url_top_5, $token);

    include_once('./funcoes/listar_musicas.php');
    desenharTop5($dados);
?>

