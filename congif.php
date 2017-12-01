<?php

    $host = "127.0.0.1";
    $hostuser = "mi_tienda";
    $hostpw = "tienda01";
    $hostdb = "mi_tienda";

    $conexion = mysqli_connect($host,$hostuser,$hostpw,$hostdb);

    if($conexion)
    {
    	return "CONECTADO";
    }else{
    	return "NO CONECTADO";
    }

?>