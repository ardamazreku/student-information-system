<?php
//startimi i sesionit
session_start();

//marrja e te dhenave me metoden GET
//perdoruesi i kyqur dhe roli i tij administrator
if(isset($_SESSION['usernameID']) && isset($_SESSION['roli']) && $_SESSION['roli'] == 1 && isset($_GET['id'])) {
	$id = $_GET['id'];

	//konekto me db
	require "connect.php";

	$deleteQuery = "DELETE FROM orari WHERE id = '$id';";
	//ekzekutimi i query-it per fshirjen
	mysqli_query($connect, $deleteQuery);
	
}

//ridrejto ne faqen baze

header("Location: ../../deleteOrariNgaAdmini.php");
?>