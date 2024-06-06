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
</head>
<body>
    <h2>Consulta de Cita</h2>
    <form action="consulta_cita.php" method="post">
        <label for="folio">Folio de la Cita:</label>
        <input type="text" id="folio" name="folio" required>
        <button type="submit">Consultar</button>
    </form>

    <?php

    $servername = "localhost";
    $username = "hostal";
    $password = "perro123";
    $dbname = "perrhostal";
    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['folio'])) {
        $folio = $_POST['folio'];

        
        $sql = "SELECT * FROM citas WHERE folio = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $folio);
        $stmt->execute();
        $result = $stmt->get_result();

 
        if ($result->num_rows > 0) {

            echo "<h2>Datos de la Cita</h2>";
            echo "<table>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><th>Detalle</th><th>Dato</th></tr>";
                echo "<tr><td>Folio:</td><td>" . $row['folio'] . "</td></tr>";
                echo "<tr><td>Nombre del Dueño:</td><td>" . $row['nombre_dueno'] . "</td></tr>";
                echo "<tr><td>Nombre de la Mascota:</td><td>" . $row['nombre_mascota'] . "</td></tr>";
                echo "<tr><td>Fecha:</td><td>" . $row['fecha'] . "</td></tr>";
                echo "<tr><td>Hora:</td><td>" . $row['hora'] . "</td></tr>";
                echo "<tr><td>Servicio:</td><td>" . $row['servicio'] . "</td></tr>";
            }
            echo "</table>";

        } else {
            echo "No se encontraron resultados para el folio proporcionado.";
        }

        // Cerrar la conexión
        $stmt->close();
        $conn->close();
    }
    ?>
    <br>
    <a href="registro_mascota.php">Regresar</a>
</body>
</html>
