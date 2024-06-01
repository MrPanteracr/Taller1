<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo de Tarjetas con Datos de la BDD</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Personas</h2>
    <div class="row">
      <?php
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

        // Consulta a la tabla Persona
        $sql = "SELECT nombre, correo, mensaje FROM Persona";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Mostrar resultados
          while($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '  <div class="card">';
            echo '    <div class="card-body">';
            echo '      <h5 class="card-title">' . htmlspecialchars($row["nombre"]) . '</h5>';
            echo '      <h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($row["correo"]) . '</h6>';
            echo '      <p class="card-text">' . htmlspecialchars($row["mensaje"]) . '</p>';
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
          }
        } else {
          echo "<p>No hay resultados</p>";
        }

        $conn->close();
      ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
