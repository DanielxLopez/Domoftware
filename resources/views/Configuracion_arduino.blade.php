@include('plantillas.navinicio')

<!DOCTYPE html>
<html>
<head>
  <title>Actualización de Arduino</title>
</head>
<body>
  <h1>Configuración de Arduino</h1>
  <form action="/update" method="POST" enctype="multipart/form-data">
    SSID WiFi: <input type="text" name="ssid"><br>
    Contraseña WiFi: <input type="password" name="password"><br>
    Nuevo código: <input type="file" name="code"><br>
    <input type="submit" value="Actualizar">
  </form>
</body>
</html>


@include('plantillas.Terminos_condiciones')
