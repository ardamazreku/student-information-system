<?php

//konekto me db
require "../functions/connect.php";

//studenti i kyqur
$usernameID = $_SESSION['usernameID'];

$kodi=$_POST['kodi'];
$emriLendes=$_POST['emriLendes'];
$kredite=$_POST['kredite'];
$statusi=$_POST['statusi'];
$grpare=$_POST['grpare'];
$grdyte=$_POST['grdyte'];
$ushpare=$_POST['ushpare'];
$ushdyte=$_POST['ushdyte'];
$klasa=$_POST['klasa'];
$ditet=$_POST['ditet'];
$semestri=$_POST['semestri'];
$nr=$_POST['nr'];


$query1="INSERT INTO lenda(kodi,emri,kredite,statusi,GrI_koha,GrII_koha,ushtrimet_GrI,ushtrimet_GrII,klasa,ditet,semestri_id,nr_studenteve) VALUES('$kodi','$emriLendes','$kredite','$statusi','$grpare',
'$grdyte','$ushpare','$ushdyte','$klasa','$ditet','$semestri','$nr');";

$query1Res=mysqli_query($connect,$query1);

header("Location: ../../registerLendet.php");

?>