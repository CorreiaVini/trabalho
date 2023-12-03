<?php


    // function getTempoMusica($ms){
    //     $minutos = floor($ms / 60000);
    //     $segundos = floor(($ms % 60000) / 1000);
    //     $segundosFormatado = str_pad($segundos, 2, '0', STR_PAD_LEFT);

    //     return $minutos . ":" . $segundosFormatado;
    // }

    function desenharTop5($dados){
        $count = 0;
        foreach ($dados['tracks']['items'] as $item) {
            $count += 1;
            if($count > 5){
                break;
            }
            $name = $item['track']['name'];

            // Resolução da imagem de capa
            // ['images'][x] = 64px, [0] = 640px, [1] = 300px, [2] = 64px
            $url_imagem = $item['track']['album']['images'][2]['url'];
            $uri = $item['track']['uri'];
            $artistas = implode(', ', array_column($item['track']['artists'], 'name'));
            
            ?>

            <div class="div_musica">
                    <div class="div_img_capa">
                        <img src="<?= $url_imagem ?>" alt="">
                    </div>
                    <div class="div_informacoes">
                        <div class="div_informacoes_musica">
                            <div class="div_nome_musica">
                                <h1 class='nome-musica'><?= $name ?></h1>
                                <span class="material-icons play desabilitado" onclick='tocar_musica("<?= $uri ?>")'>play_arrow</span>
                            </div>
                            <div class="div_artistas">
                                <p class="artistas">By <?= $artistas ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="div_like">
                        <span class="material-icons btn-like" onclick='enviarMusica("<?= $name ?>", "<?= $url_imagem ?>", "<?= $uri ?>", "<?= $artistas ?>")'>favorite</span>
                    </div>
                </div>
            <?php
        }
    }

    function desenharResultadoPesquisa($dados){
        $count = 0;
        foreach ($dados['tracks']['items'] as $item) {
            $count += 1;
            if($count > 5){
                break;
            }
            $name = $item['name'];
            $uri = $item['uri'];
            // Resolução da imagem de capa
            // ['images'][x] = 64px, [0] = 640px, [1] = 300px, [2] = 64px
            $url_imagem = $item['album']['images'][2]['url'];
            $artistas = implode(', ', array_column($item['artists'], 'name'));

            ?>

            <div class="div_musica">
                    <div class="div_img_capa">
                        <img src="<?= $url_imagem ?>" alt="">
                    </div>
                    <div class="div_informacoes">
                        <div class="div_informacoes_musica">
                            <div class="div_nome_musica">
                                <h1 class='nome-musica'><?= $name ?></h1>
                                <span class="material-icons play desabilitado" onclick='tocar_musica("<?= $uri ?>")'>play_arrow</span>
                            </div>
                            <div class="div_artistas">
                                <p class="artistas">By <?= $artistas ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="div_like">
                        <span class="material-icons btn-like" onclick='enviarMusica("<?= $name ?>", "<?= $url_imagem ?>", "<?= $uri ?>", "<?= $artistas ?>")'>favorite</span>
                    </div>
                </div>
            <?php
        }
    }


?>
