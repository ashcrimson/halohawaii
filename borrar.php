<?php

	include("conexion.php");

	$id=$_GET["id"];

	$base->query("DELETE FROM precios WHERE ID='$id'");

	header("Location:index.php");

?>