<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../stilo.css">
        <title>Gestión Lugar</title>
    </head>
    <body>
        <?php
            require '../conexion.php';
            
            $tipo=$_POST["tipo"];
            $sql="nada";
            $texto="a";
            switch ($tipo){
                case '1':
                    /* Alta */
                    $ip=$_POST["ip"];
                    $lugar=$_POST["lugar"];
                    $descripcion=$_POST["descripcion"];

                    $sql="INSERT INTO lugar(ip,lugar,descripcion)VALUES('".$ip."','".$lugar."','".$descripcion."');";
                    $texto="añadido";
                    break;
                case '2':
                    /* Modificación */
                    $ip=$_POST["ip"];
                    $lugar=$_POST["lugar"];
                    $descripcion=$_POST["descripcion"];
                    $ipAntiguo=$_POST["ipAntiguo"];

                    $sql="UPDATE lugar SET ip = '".$ip."', lugar = '".$lugar."', descripcion = '".$descripcion."' WHERE ip='".$ipAntiguo."';";
                    $texto="modificado";
                    break;
                case '3':
                    /* Borrado */
                    $ip=$_POST["ip"];

                    $sql="DELETE FROM lugar WHERE ip = '".$ip."';";
                    $texto="eliminado";
            }
            /* Acceder a la base de datos */
            
	        $Resultado=$Conexion->query($sql);
            echo $Conexion->errno;
            
            if($Conexion->affected_rows==0){echo "<h2>No se han ".$texto." ninguna fila</h2>";}
            elseif($Conexion->affected_rows==-1){echo "<h2>Ha habido un error al ".$texto." de la fila</h2>";}
            else{echo "<h2>Se han ".$texto." ".$Conexion->affected_rows." fila</h2>";}
            $Conexion->close();
        ?>
        <p><a href="../index.html">Inicio</a></p>
    </body>
</html>