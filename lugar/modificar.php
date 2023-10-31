<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stilo.css">
    </head>
    <body>
        <h1>Modificación</h1>
        <p><a href="gestion.php" class="bo">Gestión</a><a href="../index.html">Inicio</a></p>
        <?php
            if(isset($_GET["ip"])){
                require '../conexion.php';

                $ip=$_GET["ip"];

                $sql = "SELECT * FROM lugar WHERE ip = '".$ip."';";
                $Resultado=$Conexion->query($sql);

                $fila=$Resultado->fetch_array();
                if(!$fila){echo "<h2>Ese lugar no existe.</h2>";}
                else{
                    echo "<table><tr><th>IP</th><th>Lugar</th><th>Descripción</th></tr>";
                    echo "<tr><td>".$fila["ip"]."</td><td>".$fila["lugar"]."</td><td>".$fila["descripcion"]."</td></tr></table>";
                    echo '
                        <form action=procesoLugar.php method=POST>
                            <p>
                                <label for="ip">Ip del equipo: </label>
                                <input type="text" name="ip" value="'.$fila["ip"].'">
                            </p>
                            <p>
                                <label for="lugar">Nombre del lugar: </label>
                                <input type="text" name=lugar value="'.$fila["lugar"].'">
                            </p>
                            <p>
                                <label for="descripcion">Descripción del lugar: </label>
                                <input type="text" name="descripcion" value="'.$fila["descripcion"].'">
                            </p>
                            <p>¿Es este el lugar que desea modificar?</p>
                            <input type=hidden name="ipAntiguo" value="'.$ip.'">
                            <input type=hidden name="tipo" value="2">
                            <input type=submit value="SÍ">
                        </form>';
                }
                $Conexion->close();
            }
        ?>
    </body>
</html>