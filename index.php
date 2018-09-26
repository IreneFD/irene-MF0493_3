<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="author" content="Irene Fernandez" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Login</title>
		<style type="text/css">
		</style>
	</head>
	<body>
	
		<form action="#" method="POST">
		
			<div><label>Usuario</label><input type="text" name="usuario" /></div>
			<div><label>Contrasinal</label><input type="password" name="contrasinal" /></div>
			<div><input type="submit" value="Enviar" /><input type="reset" value="X" /></div>
		
		</form>

	</body>
</html>
<?php
$conexion = new mysqli("localhost", "root", "", "empresa");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}

if(isset($_POST['usuario'])&& $_POST['contrasinal']){
	$nome = $_POST['usuario'];
	$contrasinal = $_POST['contrasinal'];
	$consulta = "SELECT id, nome, contrasinal FROM usuario WHERE nome = '$nome'";
	$login = $conexion->query($consulta);
	if($login->num_rows == 0){
		die("Este usuario no existe en la base de datos");
	}
	while($fila = $login->fetch_assoc()){
		if(md5($contrasinal) == $fila['contrasinal']){
			$id = $fila['id'];
			session_start();
			$_SESSION['id'] = $id;
			$_SESSION['usuario'] = $nome;
			$_SESSION['contrasinal'] = $contrasinal;
			header("Location: confirmacion.php");
		} else {
			echo "Contraseña incorrecta";
		}
	}
}
?>