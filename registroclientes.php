<?php
//Recibir los datos y almacenarlos en variables
include './cn.php';
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$calle = $_POST["calle"];
$colonia = $_POST["colonia"];
$cp = $_POST["cp"];
$telefono = $_POST["telefono"];


//Consulta para insertar
$insertar = "INSERT INTO clientes(nombre, apellido, correo, calle, colonia, cp, telefono) VALUES ('$nombre', '$apellido', '$correo', '$calle', '$colonia', '$cp', '$telefono')";

//Ejecutar consulta
$resultado = mysqli_query($conexion, $insertar);

if(!$resultado){
	echo 'Error al registrarse';
} else {
	echo'Usuario registrado';
}
//Cerrar conexion
//mysqli_close($conexion);