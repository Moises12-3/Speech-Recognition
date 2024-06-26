const btnStart = document.getElementById('btnStart');
const btnStop = document.getElementById('btnStop');
const textArea = document.getElementById('textArea');

const recognition = new webkitSpeechRecognition();

recognition.continuous = true;
// recognition.lang = 'es-ES';
recognition.lang = 'en-US'; // Cambiado a inglés
recognition.interimResult = false;

btnStart.addEventListener('click', () => {
    recognition.start();
});

btnStop.addEventListener('click', () => {
    recognition.abort();
});

recognition.onresult = (event) => {
    const texto = event.results[event.results.length - 1][0].transcript;
    textArea.value = texto;
    leerTexto(texto);
}

function leerTexto(text) {
    const speech = new SpeechSynthesisUtterance(text);
    speech.volume = 1;
    speech.rate = 0.2;
    speech.pitch = 0.1;
    //speech.lang = 'es-ES'
    recognition.lang = 'en-US'; // Cambiado a inglés

    window.speechSynthesis.speak(speech);
}