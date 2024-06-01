<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejemplo de Tarjetas con Datos de la BDD</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    // Consulta a la tabla Indice
    $sql = "SELECT nombre, direccion FROM Indice";
    $result = $conn->query($sql);
  ?>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Ejemplos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php
          if ($result->num_rows > 0) {
            // Mostrar resultados en la navbar
            while($row = $result->fetch_assoc()) {
              echo '<li class="nav-item"><a class="nav-link" href="' . $row["direccion"] . '">' . $row["nombre"] . '</a></li>';
            }
          }
        ?>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Personas</h2>
    <div class="row">
      <?php
        // Consulta a la tabla Persona
        $sql_persona = "SELECT nombre, correo, mensaje FROM Persona";
        $result_persona = $conn->query($sql_persona);

        if ($result_persona->num_rows > 0) {
          // Mostrar resultados
          while($row = $result_persona->fetch_assoc()) {
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
