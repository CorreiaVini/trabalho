window.onSpotifyWebPlaybackSDKReady = () => {
    const player = new Spotify.Player({
        name: "Soundz",
        getOAuthToken: (cb) => {
        cb(token);
        },
        volume: 0.5,
    });

    player.addListener("ready", ({ device_id }) => {
        const connect_to_device = () => {
            let dispositivo = fetch("https://api.spotify.com/v1/me/player", {
                method: "PUT",
                body: JSON.stringify({
                device_ids: [device_id],
                play: false,
            }),
            headers: new Headers({
                Authorization: "Bearer " + token,
            }),
            }).then((response) => console.log(response));
        };
        connect_to_device();
    });

    player.connect().then((success) => {
        if (success) {
            console.log("Conectado com sucesso!");
        }
    });
};

const tocar_musica = async (uri) => {
    // Verificar o estado atual de reprodução
    let status_musica = await fetch("https://api.spotify.com/v1/me/player", {
        method: "GET",
        headers: new Headers({
            Authorization: "Bearer " + token,
        }),
    }).then((response) => response.json());

    // Verificar se há uma música em reprodução
    if (status_musica && status_musica.is_playing) {
        // Verificar se a música atual é a mesma que a nova musica
        if (status_musica.item && status_musica.item.uri === uri) {
            // Pausar a música atual
            await fetch("https://api.spotify.com/v1/me/player/pause", {
                method: "PUT",
                headers: new Headers({
                    Authorization: "Bearer " + token,
                }),
            });
            return;
        }
    }
    // Tocar a musica
    let tocando = await fetch("https://api.spotify.com/v1/me/player/play", {
        method: "PUT",
        body: JSON.stringify({
            uris: [uri],
        }),
        headers: new Headers({
            Authorization: "Bearer " + token,
        }),
    }).then((data) => console.log(data));
};