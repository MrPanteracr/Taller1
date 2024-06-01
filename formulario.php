<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo Formulario</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Formulario de Contacto</h2>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conexión a la base de datos
        $servername = "138.59.135.33";
        $username = "Ejemplos";
        $password = "administrador";
        $dbname = "tiusr15pl_Ejemplos";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
          die("Conexión fallida: " . $conn->connect_error);
        }

        // Preparar y bind
        $stmt = $conn->prepare("INSERT INTO Persona (nombre, correo, mensaje) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $mensaje);

        // Establecer parámetros y ejecutar
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $mensaje = $_POST["mensaje"];
        $stmt->execute();

        echo "<div class='alert alert-success' role='alert'>Mensaje enviado con éxito.</div>";

        $stmt->close();
        $conn->close();
      }
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
      </div>
      <div class="form-group">
        <label for="correo">Correo Electrónico</label>
        <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required>
      </div>
      <div class="form-group">
        <label for="mensaje">Mensaje</label>
        <textarea class="form-control" id="mensaje" name="mensaje" rows="3" placeholder="Escribe tu mensaje" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>