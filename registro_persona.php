



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>Lista de Usuarios</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color:#45a049;
        }
    </style>
</head>
<body class="fondo">
    <h1>Lista de Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Fecha de Nacimiento</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            include "conexion.php";
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_GET["id"])) {
                $id = $_GET["id"];
               
                $sql2 = "DELETE FROM usuario WHERE id = $id";
                $a=$conexion-> query($sql2);
            
            }

            $sql = "SELECT id, nombres, correo_electronico, telefono, fecha_de_nacimiento FROM usuario";
            $resultado = $conexion->query($sql);

            while ($fila = $resultado-> fetch_object() ) { ?>
            <tr>
                <td><?= $fila->id ?> </td>
                <td><?= $fila->nombres ?> </td>
                <td><?= $fila->correo_electronico?> </td>
                <td><?= $fila->telefono ?> </td>
                <td><?= $fila->fecha_de_nacimiento ?> </td>
                <td>
                <form action="registro_persona.php?id=<?= $fila->id ?>" method="POST">
                    <input type="hidden" name="ida" value="<?php $fila->id ?>">
                    <button type="submit">Eliminar</button>
                </form>
                </td>


            </tr>
            <?php  }
            ?>
                
            
                
              
           
            
        </tbody>
    </table>

    <?php

    $conexion->close();
    ?>
     <h1> </h1>
    <div>
        <a href="index.php" class="boton"> Registrarse </a>
    </div>
</body>
</html>
