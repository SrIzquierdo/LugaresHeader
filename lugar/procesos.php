<?php
    $proceso=$_GET["gestion"];
    $ip=$_GET["ip"];
    if($proceso=="baja"){
        header("Location:borrar.php?ip=".$ip."");
    }
    elseif($proceso=="modificar"){
        header("Location:modificar.php?ip=".$ip."");
    }