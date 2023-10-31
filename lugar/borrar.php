<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stilo.css">
    </head>
    <body>
        <h1>Eliminación</h1>
        <p><a href="gestion.php" class="bo">Gestión</a><a href="../index.html">Inicio</a></p>
        <?php
            if(isset($_GET["ip"])){
                require '../conexion.php';

                $ip=$_GET["ip"];

                $sql = "SELECT * FROM lugar WHERE ip = '".$ip."';";
                $Resultado=$Conexion->query($sql);

                if($Resultado->num_rows==0){echo "<h2>Ese Lugar no existe.</h2>";}
                else{
                    echo "<table><tr><th>IP</th><th>Lugar</th><th>Descripción</th></tr>";
                    while($fila = $Resultado->fetch_array()){
                        echo "<tr><td>".$fila["ip"]."</td><td>".$fila["lugar"]."</td><td>".$fila["descripcion"]."</td></tr>";
                    }
                    echo "</table>";

                    echo '
                        <form action=procesoLugar.php method=POST>
                            <p>¿Es este el lugar que desea eliminar?</p>
                            <input type=hidden name=ip value="'.$ip.'">
                            <input type=hidden name="tipo" value="3">
                            <input type=submit value=SÍ>
                        </form>';
                }
                $Conexion->close();
            }
        ?>
    </body>
</html>