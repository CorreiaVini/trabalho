const btn_like = document.querySelectorAll('.btn-like');
const btn_pesquisar = document.querySelector('#btnPesquisar'); 
const lista_musicas = document.querySelector('.lista');
const btn_play = document.querySelectorAll('.play');
const play_uri = document.querySelectorAll('a');

// Troca icone de play quando clicado
btn_play.forEach(play => {
    play.addEventListener('click', () => {
        if (play.innerHTML === 'pause') {
            play.innerHTML = 'play_arrow';
        } else {
            play.innerHTML = 'pause';
            btn_play.forEach(otherPlay => {
                if (otherPlay !== play) {
                    otherPlay.innerHTML = 'play_arrow';
                    
                }
            });
        }
    });
});

// Muda cor do coracao quando clicado
btn_like.forEach(btn => {
    btn.addEventListener('click', () => {
        btn.classList.toggle('clicado');
    });
});

// Limpa a lista de musicas visíveis apos o clique no botão pesquisar
btn_pesquisar.addEventListener('click', ()  =>{
    lista_musicas.innerHTML = "";
});

function LogIn() {
    let logInUri = 'https://accounts.spotify.com/authorize' +
        '?client_id=518728c7ae25480e88016eb093907b3e' +
        '&response_type=code' +
        '&redirect_uri=https://trabalho-php-production.up.railway.app/inc/callback.php' +
        '&scope=app-remote-control user-top-read user-read-currently-playing user-read-recently-played streaming app-remote-control user-read-playback-state user-modify-playback-state' +
        '&show_dialog=true';
    
    window.open(logInUri, '_self');
}



