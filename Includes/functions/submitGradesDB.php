<?php

//marrja e te dhenave te formes me metoden POST
$idStd = $_POST['idStd'];
$kodiLnd = $_POST['kodiLnd'];
$idProf = $_POST['idProf'];
$idDept = $_POST['idDept'];
$idSem = $_POST['idSem'];
$nota = $_POST['nota'];

//konektimi me db
require "connect.php";

//query per update ne tabelen rezultatet
$updateQuery = "UPDATE rezultatet
				SET nota = '$nota', notuar = 1
				WHERE studenti = '$idStd' AND lenda = '$kodiLnd' AND profesori = '$idProf'
					AND departamenti = '$idDept' AND semestri = '$idSem';";
//ekzekutimi i query-it
mysqli_query($connect, $updateQuery);

//ridrejtoje ne faqen baze
header("Location: ../../submitGrades.php");

?>