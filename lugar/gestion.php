<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stilo.css">
        <title>Gestión Lugar</title>
    </head>
    <body>
        <h1>Listado de Lugares y su Descripción</h1>
        <p><a href="alta.html">Alta</a><a href="../index.html">Inicio</a></p>
        <?php
            /* Conexión a la base de datos del hosting */
            require '../conexion.php';

            $sql = "SELECT * FROM lugar;";
	        $Resultado=$Conexion->query($sql);

            /* Tabla de Lugares */
		    echo "<table><tr><th>IP</th><th>Lugar</th><th>Descripción</th><th colspan=2>Gestión</th></tr>";
            while($fila = $Resultado->fetch_array()){
                echo "<tr><td>".$fila["ip"]."</td><td>".$fila["lugar"]."</td><td>".$fila["descripcion"]."</td>
                    <td><a href=procesos.php?ip=".$fila["ip"]."&gestion=baja>Eliminar</a></td>
                    <td><a href=procesos.php?ip=".$fila["ip"]."&gestion=modificar>Modificar</a></td>
                </tr>";
            }
            echo "</table>";
            $Conexion->close();
        ?>
    </body>
</html>