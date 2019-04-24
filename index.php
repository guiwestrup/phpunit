<?php 
	// require_once 'app/Cliente.php';
	require 'vendor/autoload.php';
	use app\Cliente;

	$cliente = new Cliente('gui','08838589917','123123123');
	echo "<pre>";
	var_dump($cliente);
	echo "</pre>";
?>