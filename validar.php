<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//Conectarse a la base de datos
$conexion = mysqli_connect("localhost","mi_tienda","tienda01","mi_tienda");
$consulta="SELECT * FROM clientes WHERE nombre='$usuario' and id ='$clave'";
$resultado=mysqli_query($conexion, $consulta); 

$filas=mysqli_num_rows($resultado);

if($filas>0) {
	header:("location:clientes.php");
}
else {
	echo "Error en la autentificación";
}
mysqli_free_result($resultado);
//mysqli_close(conexion);