<!DOCTYPE html>
<html>

<head>
    <title>ConfiArduino</title>

    <!-- Inclusión de la barra de navegación -->
    @include('plantillas.navinicio')

    <!-- Estilos específicos para la configuración de Arduino -->
    <link rel="stylesheet" href="{{ asset('css/arduinoconfig.css') }}">

</head>

<body>

    <h2 class="titulo display-5 font-weight-light">Arduino Modulo WIFI</h2>
    <img src="{{ asset('images/nav6.png') }}" class="imgnav">

    <br>

    <div class="Arduinoconfig">

        <!-- Selector de dispositivo -->
        <label for="device" style="text-align: right;">Selecciona el dispositivo:</label>
        <select name="device" class="form-control" id="device">
            <option value="esp32">Arduino ESP32</option>
            <option value="esp8266">Arduino ESP8266</option>
        </select>

        <!-- Formulario de configuración y editor de texto -->
        <div class="form-and-editor">
            <div class="form-group">
                <!-- Formulario para configurar la red WIFI -->
                <form action="{{ route('arduino.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2>Configurar WIFI</h2>
                    <label for="ssid" style="text-align: left;">SSID:</label>
                    <input type="text" name="ssid" class="form-control">
                    <label for="password" style="text-align: left;">Contraseña:</label>
                    <input type="password" name="password" class="form-control">
                    <label for="ssid" style="text-align: left;">IP Red:</label>
                    <input type="number" name="ip" class="form-control">
                </form>
            </div>

            <div class="form-group">
                <!-- Editor de texto para el código Arduino -->
                <textarea id="arduinoCode" placeholder="Código del Arduino"></textarea>
            </div>
        </div>

        <!-- Botón para cargar la configuración -->
        <button type="submit" class="btn btn-danger" style="width: 250px;">Cargar</button>

    </div>

    <!-- Mostrar mensajes de error -->
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


<script>
    
function changeCode(device) {
    if (device === 'esp32') {
        document.getElementById('arduinoCode').value = '{{ asset('arduinoCod/Esp32.txt') }}';
    } else if (device === 'esp8266') {
        document.getElementById('arduinoCode').value = '{{ asset('arduinoCod/Esp8266.txt') }}';
    } else {
        document.getElementById('arduinoCode').value = 'Selecciona un dispositivo.';
    }
}

// Cambiar el código al cargar la página
const deviceSelect = document.getElementById('device');
deviceSelect.addEventListener('change', function() {
    const selectedDevice = deviceSelect.value;
    changeCode(selectedDevice);
});

changeCode(deviceSelect.value);

</script>


<script src="{{ asset('js/Arduinoconfg.js') }}"></script>

    <br>

    <!-- Inclusión del pie de página -->
    @include('plantillas.fooster')

</body>

</html>
