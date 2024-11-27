<?php

include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = mysqli_real_escape_string($conexion, $_POST['nombres']);
    $correo_electronico = mysqli_real_escape_string($conexion, $_POST['correo_electronico']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $fecha_de_nacimiento = mysqli_real_escape_string($conexion, $_POST['fecha_de_nacimiento']);
    
    $sql = "INSERT INTO usuario (nombres, correo_electronico, telefono, fecha_de_nacimiento) 
            VALUES ('$nombres', '$correo_electronico', '$telefono', '$fecha_de_nacimiento')";

    if ($conexion->query($sql) === TRUE) {
        $mensaje = "Registro guardado exitosamente.";
    } else {
        $mensaje = "Error al guardar el registro: " . $conexion->error;
    }
    
    $conexion->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>Formulario de Registro</title>
</head>
<body class="fondo2">
    <h1>Formulario de Registro de Usuario</h1>
    <?php if (isset($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>


    <form action="index.php" method="POST">
        <label for="nombres">Nombres:</label><br>
        <input type="text" id="nombres" name="nombres" required><br><br>

        <label for="correo_electronico">Correo Electrónico:</label><br>
        <input type="email" id="correo_electronico" name="correo_electronico" required><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="fecha_de_nacimiento">Fecha de Nacimiento:</label><br>
        <input type="date" id="fecha_de_nacimiento" name="fecha_de_nacimiento" required><br><br>

        <input type="submit" value="Registrar">
    </form>
    <h1> </h1>
    <div>
        <a href="registro_persona.php" class="boton">ver registros</a>
    </div>
</body>
</html>