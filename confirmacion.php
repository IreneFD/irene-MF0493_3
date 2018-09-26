<?php

	session_start();
	$id = $_SESSION['id'];
	$codigo = $_SESSION['usuario'];
	$contrasinal = $_SESSION['contrasinal'];

	echo "id: ".$id."<br>";
	echo "nome: ".$codigo."<br>";
	echo "contrasinal: ".$contrasinal;

?>