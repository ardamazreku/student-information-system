<?php
session_start();
//konektimi me db (i nevojshem)
require "connect.php";


$usernameID=$_SESSION['usernameID'];
if(isset($_POST['grupet'])) {
$grupet=$_POST['grupet'];


	//query per update ne db
	$updateQuery = "UPDATE orari
					SET grupet ='$grupet' where studenti='$usernameID'";
					$updateQuery2= "UPDATE rezultatet
					SET grupet ='$grupet' where studenti='$usernameID'";
	mysqli_query($connect, $updateQuery);
	mysqli_query($connect, $updateQuery2);
	
	}

	
	

?>