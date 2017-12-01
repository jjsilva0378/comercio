<?php
	session_start();
	include './cn.php';
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
		$arreglo=$_SESSION['carrito'];
		$encontro=false;
		$numero=0;
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['Id']==$_GET['id']){
				$encontro=true;
				$numero=$i;	
			}
		}
		if($encontro==true){
			$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
			$_SESSION['carrito']=$arreglo;
		}else{
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysql_query("selec * from productos where id=".$_GET['id']);
			while ($f=mysql_fetch_array($re)){
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
			}
			$datosNuevos=array('Id'=>$_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);

			array_push($arreglo, $datosNuevos);
			$_SESSION['carrito']=$arreglo;
		}
	}
	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysql_query("selec * from productos where id=".$_GET['id']);
			while ($f=mysql_fetch_array($re)){
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
			}
			$arreglo[]=array('Id'=>$_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
			$_SESSION['carrito']=$arreglo;
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Carrito de Compras</h1>
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		<?php
		    $total=0;
			if (isset($_SESSION['CARRITO'])) {
					$datos=$_SESSION['carrito'];
					
					for($i=0;$i<count($datos);$i++){
		?>
		
					<div class="producto">

						<center>
							<img src="./images/<?php echo $datos[$i]['Imagen'];?>">
							<span><?php echo $datos[$i]['Nombre']?></span>
							<span>Precio:<?php echo $datos[$i]['Precio'];?></span>
							<span>Cantidad <input type="txt" value="<?php echo $datos[$i]['Cantidad'] ?>"></span>
							<span>Precio:<?php echo $datos[$i]['Precio'] * $datos[$i]['Cantidad'];?></span><br>
						</center>	
					</div>
		<?php
			$total=($datos[$i]['Cantidad'] * $datos[$i]['Precio'])+$total;				

					}
				}else{
					echo'<center><h2>El carrito de compras esta vacio</h2></center>';
				}
				echo '<center><h2>Total:'.$total.'</h2></center>';	
	
		?>
		<center><a href="./">Ver Catalogo</a></center>

		
	</section>
</body>
</html>