<?php
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

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO Contactos (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        $error = "Error en la preparación de la declaración: " . $conn->error;
    } else {
        $stmt->bind_param("ssss", $nombre, $email, $telefono, $mensaje);
        if ($stmt->execute()) {
            $success = "¡Tus comentarios han sido enviados! En breve alguien del equipo se pondrá en contacto contigo.";
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PerrHostal</title>
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
                <li><a href="login.php" class="btn-register">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="img">
            <img src="https://lirp.cdn-website.com/ffc28edd/dms3rep/multi/opt/6+%281%29-1920w.png" alt="" width="20%">
        </section>
        <section class="hola">
            <h2 class="Titulo">Contáctanos</h2>
        </section>
        <section class="contact-info">
            <h2>¡Nos encantaría saber de ti!</h2>
            <p>Si tienes alguna pregunta, necesitas más información o deseas agendar una visita, no dudes en contactarnos.</p>
            <p><strong>Teléfono:</strong> (55) 6588 7710</p>
            <p><strong>Correo Electrónico:</strong> info@perrhostal.com</p>
            <p><strong>Dirección:</strong> Av. 3 numero 140, Col. San Pedro de los Pinos, Distrito Federal, DF 03800, MX</p>
            <p><strong>Horario de Atención:</strong></p>
            <ul>
                <li>Lunes a Viernes: 9:00 AM - 6:00 PM</li>
                <li>Sábado: 10:00 AM - 4:00 PM</li>
                <li>Domingo: Cerrado</li>
            </ul>
            <p>También puedes seguirnos en nuestras redes sociales para estar al tanto de nuestras novedades y eventos:</p>
            <ul>
                <li>Facebook: <a href="https://facebook.com/perrhostal" target="_blank">facebook.com/perrhostal</a></li>
                <li>Instagram: <a href="https://instagram.com/perrhostal" target="_blank">instagram.com/perrhostal</a></li>
            </ul>
            <p>¡Esperamos conocerte a ti y a tu peludo amigo pronto!</p>
            <p></p>
            <p></p>
        </section>
        <section class="contact-main-container">
            <div>
                <div class="contact-left">
                    <h3>Contacto</h3>
                    <?php if ($error) { ?>
                        <p class="error"><?php echo $error; ?></p>
                    <?php } ?>
                    <?php if ($success) { ?>
                        <p class="success"><?php echo $success; ?></p>
                    <?php } ?>
                    <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                          <div>
                            <label>Nombre</label>
                            <input type="text" name="nombre" required>
                          </div>
                          <div>
                            <label>Correo</label>
                            <input type="email" name="email" required>
                          </div>
                          <div>
                            <label>Teléfono</label>
                            <input type="text" name="telefono" required>
                          </div>
                          <div class="full">
                            <label>Mensaje</label>
                            <textarea name="mensaje" required></textarea>
                          </div>
                          <div class="full">
                            <button class="boton-enviar" type="submit">Enviar</button>
                          </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p class="footer-text">© 2024 PerrHostal. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
