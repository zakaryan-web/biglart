import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;
window.socket = new Echo({
    broadcaster: 'reverb',
    key: window.echoData.key,
    wsHost: window.echoData.wsHost,
    wsPort: window.echoData.wsPort,
    wssPort: window.echoData.wssPort,
    forceTLS: (window.echoData.forceTLS ?? 'https') === 'https',
    disableStats: true,
    enabledTransports: ['ws', 'wss']
});
