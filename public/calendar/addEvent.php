<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$descripcion = $_POST['descripcion'];
	$relevancia = $_POST['relevancia'];
	$color = $_POST['color'];

	$sql = "INSERT INTO recursos(titulo, fechaInicio, fechaFin, color, descripcion, relevancia) values ('$title', '$start', '$end', '$color', '$descripcion', '$relevancia')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: ./index.php');

	
?>
