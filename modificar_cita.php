<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "hostal";
$password = "perro123";
$dbname = "perrhostal";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folio = $_POST['folio'];
    $nombre_dueno = $_POST['nombre-dueno'];
    $nombre_mascota = $_POST['nombre-mascota'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $servicio = $_POST['servicio'];

    $sql = "UPDATE citas SET nombre_dueno=?, nombre_mascota=?, fecha=?, hora=?, servicio=? WHERE folio=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación de la declaración: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $nombre_dueno, $nombre_mascota, $fecha, $hora, $servicio, $folio);

    if ($stmt->execute()) {
        $mensaje = "¡Cita modificada exitosamente!";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cita</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="D:\Santiago Escobar\1 -Universidad\6to Semestre\Info VI\Proyecto final\Logo.png" alt="" width="120px">
        </div>
        <nav>
            <ul>
                <li><a href="Index.html">Inicio</a></li>
                <li><a href="Nosotros.html">Nosotros</a></li>
                <li><a href="Contacto.php">Contacto</a></li>
                <li><a href="login.php" class="btn-register">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <section id="modificar-cita" class="registro">
        <h2>Modificar Cita</h2>
        <?php if ($mensaje) echo "<p class='success'>$mensaje</p>"; ?>
        <form action="modificar_cita.php" method="post" class="formulario-registro">
            <div class="grupo-input">
                <label for="folio">Folio de la Cita</label>
                <input type="text" id="folio" name="folio" required>
            </div>
            <div class="grupo-input">
                <label for="nombre-dueno">Nombre del Dueño</label>
                <input type="text" id="nombre-dueno" name="nombre-dueno" required>
            </div>
            <div class="grupo-input">
                <label for="nombre-mascota">Nombre de la Mascota</label>
                <input type="text" id="nombre-mascota" name="nombre-mascota" required>
            </div>
            <div class="grupo-input">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
            <div class="grupo-input">
                <label for="hora">Hora</label>
                <input type="time" id="hora" name="hora" required>
            </div>
            <div class="grupo-input">
                <label for="servicio">Servicio</label>
                <input type="text" id="servicio" name="servicio" required>
            </div>
            <button type="submit" class="boton">Modificar Cita</button>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Cita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h2 {
            margin-top: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            padding: 5px;
            width: 200px;
        }
        button {
            padding: 8px 16px;
            background-color: #007bff;
            border: none;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            display: inline-block;
            padding: 8px 16px;
            background-color: #f2f2f2;
            text-decoration: none;
            color: #333;
        }
        a:hover {
            background-color: #ddd;
        }
    </style>             
    <br>
    <a href="registro_mascota.php">Regresar</a>
</body>
</html>

        </form>
    </section>

    <footer>
        <p class="footer-text">
            © 2024 PerrHostal. Todos los derechos reservados.
        </
