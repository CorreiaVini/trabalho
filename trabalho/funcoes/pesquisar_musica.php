<?php

    function pesquisarMusica($nomeMusica){
        // url base
        $apiUrl = 'https://api.spotify.com/v1/search';

        $parameters = [
            'q' => "$nomeMusica",
            'type' => 'track',  // aceita parametros 'album', 'artist', 'playlist', etc.
            'limit' => '10',
            'market'=> 'BR',
        ];

        // Converte os parâmetros em uma string de consulta
        $queryString = http_build_query($parameters);

        // Adiciona a string de consulta à URL
        $apiUrl .= '?' . $queryString;

        $token = include("get_token.php");

        // Faz a requisição à API
        require_once "./inc/requests.php";
        
        $dados = get_request($apiUrl, $token);


        include_once('listar_musicas.php');
        desenharResultadoPesquisa($dados);
    }



?>