<?php

include('../funcoes/conexao_db.php');

function salvarMusica($name, $url_imagem, $uri, $artistas, $conexao) {
    try {
        // Prepare a declaração SQL de inserção
        $stmt = $conexao->prepare("INSERT INTO musicas (nome, uri, poster, artistas) VALUES (:nome, :uri, :url_imagem, :artistas)");

        // Bind os parâmetros
        $stmt->bindParam(':nome', $name);
        $stmt->bindParam(':url_imagem', $url_imagem);
        $stmt->bindParam(':uri', $uri);
        $stmt->bindParam(':artistas', $artistas);

        // Executar a declaração
        $stmt->execute();

        echo "Música salva com sucesso!";
    } catch (PDOException $e) {
        error_log("Erro ao salvar a música: " . $e->getMessage(), 0);
        echo "Desculpe, ocorreu um erro ao salvar a música. Por favor, tente novamente mais tarde.";
    }
}

if (isset($_POST['name'], $_POST['url_imagem'], $_POST['uri'], $_POST['artistas'])) {
    salvarMusica($_POST['name'], $_POST['url_imagem'], $_POST['uri'], $_POST['artistas'], $pdo);
}
?>
