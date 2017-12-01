<?php
//Conectarse a la base de datos
$conexion = mysqli_connect("localhost","mi_tienda","tienda01","mi_tienda");



if(!$conexion){
	echo 'Error al conectar a la base de datos';
}
else{
	echo'Conectado a la base de datos';
}

