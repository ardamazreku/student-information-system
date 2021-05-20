<?php
//startimi i sesionit
session_start();

//marrja e te dhenave me metoden GET
//perdoruesi i kyqur dhe roli i tij administrator
if(isset($_SESSION['usernameID']) && isset($_SESSION['roli']) && $_SESSION['roli'] == 1 && isset($_GET['kodiLnd'])) {
	$kodi = $_GET['kodiLnd'];

	//konekto me db
	require "connect.php";

	//query per fshirjen e lendes perkatese
	$deleteQuery = "DELETE FROM lenda WHERE kodi = '$kodi';";
	//ekzekutimi i query-it per fshirjen
	mysqli_query($connect, $deleteQuery);
	
}

//ridrejto ne faqen baze

header("Location: ../../deleteSubjects.php");
?>