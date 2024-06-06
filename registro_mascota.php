<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "hostal";
$password = "perro123";
$dbname = "perrhostal";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    
    header("Location: registro_mascota.php?success=1");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PerrHostal - Registro de Mascota</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="https://i.ibb.co/9sn5Ttx/Logo.png" alt="" width="120px">
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

	<section class="destacado">
    <div class="container">
        <div class="contenido">
            <div class="texto">
                <h1>Bienvenido a PerrHostal</h1>
                <p>Tu guardería canina de confianza donde tu mascota será tratada con amor y cuidado mientras estás fuera.</p>
                <a href="#registro-mascota" class="boton">Registra a tu mascota</a>
            </div>
        </div>
        
    </div>
</section>

    <section id="registro-mascota" class="registro">
        <h2>Registro de Mascota</h2>
        <form action="registro_mascota.php" method="post" class="formulario-registro">
            <div class="grupo-input">
                <label for="nombre-mascota">Nombre de la Mascota</label>
                <input type="text" id="nombre-mascota" name="nombre-mascota" required>
            </div>
            <div class="grupo-input">
                <label for="raza">Raza</label>
                <input type="text" id="raza" name="raza" required>
            </div>
            <div class="grupo-input">
                <label for="edad">Edad</label>
                <input type="number" id="edad" name="edad" required>
            </div>
            <div class="grupo-input">
                <label for="vacunas">Vacunas al día</label>
                <input type="checkbox" id="vacunas" name="vacunas">
            </div>
            <div class="grupo-input">
                <label for="color">Color</label>
                <input type="text" id="color" name="color">
            </div>
            <div class="grupo-input">
                <label for="peso">Peso (kg)</label>
                <input type="number" id="peso" name="peso">
            </div>
            <button type="submit" class="boton">Registrar Mascota</button>
        </form>
        <?php if(isset($_GET['success'])): ?>
            <p class="success-message">La mascota fue registrada exitosamente.</p>
        <?php endif; ?>
        <br>
        <a href="registro_cita.php" class="boton">Registrar Cita</a>
        <br>
        <a href="consulta_cita.php" class="boton">Consultar Cita</a>
        <a href="modificar_cita.php" class="boton">Modificar Cita</a>
    </section>

    <footer>
        <p class="footer-text">
            © 2024 PerrHostal. Todos los derechos reservados.
        </p>
    </footer>

</body>
</html>
