
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho PHP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./style.css">

</head>
<body>
    <header>
        <a href="./">
            <div class="header-logo">
                <p style="color: white">Soundz</p>
            </div>
        </a>
      
        <div class="header-items">
            <p id="btnLogIn123"><a href="sobre.html">SOBRE</a></p>
            <button onclick="LogIn()" id="btnLogIn123">LOG IN</button>
        </div>

    </header>


    <form class="search-bar" method="post">
        <div class="div_pesquisa">
            <input class="search-input" type="text" name="campoPesquisa" placeholder="Procurar Musica!">
            <input type="submit" value="Buscar" id="btnPesquisar">
        </div>
            <input type="submit" name="mais_curtidas" value="Playlist" id="playlist">
    </form>

    <section class="lista">

    <?php

        session_start();
        include('./funcoes/pesquisar_musica.php');
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["mais_curtidas"])) {
                include('./funcoes/get_musicas_db.php');
            } else if(isset($_POST['campoPesquisa'])){
                $textoPesquisa = $_POST['campoPesquisa'];
                pesquisarMusica($textoPesquisa);
            }
            

            
        } else{
            include('./funcoes/get_top5.php');
        }

    ?>

    </section>

    <footer>
        <p>© 2023 - made by <a href="https://github.com/BernardoMichels">hanson</a>, <a href="https://github.com/CorreiaVini">vini</a> and <a href="https://github.com/cristoferluch">cris</a></p>
    </footer>

    <script src="./scripts/script.js"></script>
    

    <?php

    if (isset($_SESSION['spotify_token']) && isset($_SESSION['spotify_token']->access_token)) {
        $token = $_SESSION['spotify_token']->access_token;
        ?> 
            <script src="https://sdk.scdn.co/spotify-player.js"></script>
            <script src="./scripts/web_playback.js"></script>
        <?php
    }
    ?>

    <script>

    function enviarMusica(name, urlImagem, uri, artistas) {
            console.log(name, urlImagem, uri, artistas);
            // Construa os dados a serem enviados
            var dados = new FormData();
            dados.append('name', name);
            dados.append('url_imagem', urlImagem);
            dados.append('uri', uri);
            dados.append('artistas', artistas);

            // Use fetch para enviar uma solicitação POST
            fetch('./funcoes/liked_songs.php', {
                method: 'POST',
                body: dados
            })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(error => console.error('Erro:', error));
    }

    function removerMusica(name){
        console.log(name)
    }

    const token = '<?php echo $token; ?>';
    console.log(token);
        // Verifica se o usuário esta logado para exibir os botoes de play e pause
    if (token.length > 116) {
        const play_desabilitados = document.querySelectorAll('.desabilitado');
        play_desabilitados.forEach(btn_play_desabilitado => {
            btn_play_desabilitado.classList.remove('desabilitado');
        });
    }
    </script>



</html>
