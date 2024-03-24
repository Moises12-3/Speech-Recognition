<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reconocimiento de voz</title>
</head>

<body>

    <!-- Botones para iniciar y detener el reconocimiento -->
    <button id="btnStart">COMENZAR</button>
    <button id="btnStop">DETENER</button>

    <!-- Área de texto donde se mostrará el texto reconocido -->
    <textarea id="textArea" cols="30" rows="10"></textarea>

    <script>
        const btnStart = document.getElementById('btnStart');
        const btnStop = document.getElementById('btnStop');
        const textArea = document.getElementById('textArea');

        // Crear un objeto de reconocimiento de voz
        const recognition = new webkitSpeechRecognition();

        // Establecer propiedades del reconocimiento
        recognition.continuous = true; // Reconocimiento continuo
        recognition.lang = 'en-US'; // Idioma del reconocimiento (inglés)
        recognition.interimResult = false; // Mostrar resultados intermedios

        // Evento al hacer clic en el botón de inicio
        btnStart.addEventListener('click', () => {
            recognition.start(); // Iniciar reconocimiento
        });

        // Evento al hacer clic en el botón de detener
        btnStop.addEventListener('click', () => {
            recognition.abort(); // Detener reconocimiento
        });

        // Evento que se dispara cuando se obtiene un resultado del reconocimiento
        recognition.onresult = (event) => {
            // Obtener el texto reconocido
            const texto = event.results[event.results.length - 1][0].transcript;
            // Mostrar el texto en el área de texto
            textArea.value = texto;
            // Leer el texto reconocido
            leerTexto(texto);
        }

        // Función para leer el texto reconocido
        function leerTexto(text) {
            // Crear un objeto de síntesis de voz
            const speech = new SpeechSynthesisUtterance(text);
            // Establecer propiedades del habla
            speech.volume = 5; // Volumen
            speech.rate = 1; // Velocidad de habla
            speech.pitch = 0.0; // Tono de voz
            speech.lang = 'en-US'; // Idioma de habla (inglés)
            // Pronunciar el texto
            window.speechSynthesis.speak(speech);
        }
    </script>
</body>

</html>
