<?php

// include('../funcoes/conexao_db.php');

$host = 'viaduct.proxy.rlwy.net';
$port = 56398; 
$database = 'railway';
$username = 'root';
$password = 'E54hgfE65f-ccAd4c-aD5BD3h5-C1f52';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$database";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM musicas";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<h2 id="titulo_mais_cutidas">Playlist</h2>';


    foreach ($resultados as $item) {
        $uri = $item['uri'];
        $nome = $item['nome'];
        $artistas = $item['artistas'];
        $poster = $item['poster'];

        ?>

        <div class="div_musica">
                <div class="div_img_capa">
                    <img src="<?= $poster ?>" alt="">
                </div>
                <div class="div_informacoes">
                    <div class="div_informacoes_musica">
                        <div class="div_nome_musica">
                            <h1 class='nome-musica'><?= $nome ?></h1>
                            <span class="material-icons play desabilitado" onclick='tocar_musica("<?= $uri ?>")'>play_arrow</span>
                        </div>
                        <div class="div_artistas">
                            <p class="artistas">By <?= $artistas ?></p>
                        </div>
                    </div>
                </div>
                <div class="div_like">
                <span class="material-icons btn-like" onclick='removerMusica("<?= $nome ?>")'>close</span>
                    </div>
            </div>
        <?php
    }
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

?>

