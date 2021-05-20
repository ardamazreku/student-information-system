<?php

//validimi i te dhenave te formes se kyqjes

//marrja e te dhenave te formes permes metodes POST
$usernameID = $_POST['usernameLogin'];
$pass = $_POST['passLogin'];

$login = true;

//konektimi me db
require "Includes/functions/connect.php";

//validimi i te dhenave hyrese

//nese asnjera nga fushat nuk eshte plotesuar
if(empty($usernameID) && empty($pass)) {
	$errorGen = "Te gjitha te dhenat duhet te plotesohen!";
	$login = false;
}

//nese te pakten njera nga fushat ka vlere, atehere validoje ate vleren
else {
	//validimi i username-it
	
	//nese username eshte i zbrazet
	if(empty($usernameID)) {
		$errorUseraname = "Fusha e username-it duhet te plotesohet!";
		$login = false;
	}
	
	//nese username ka vlere, validoje ate
	else {
		//nese perdoruesi nuk ekziston
		
		$query1 = "SELECT * FROM perdoruesi WHERE id = '$usernameID';";
		$query1Res = mysqli_query($connect, $query1);
		$count1 = mysqli_num_rows($query1Res);
		
		//nese nuk ka rreshta rezultat => perdoruesi nuk ekziston
		if($count1 == 0) {
			$errorUsername = "Ky perdorues nuk ekziston!";
			$login = false;
		}
	}
	
	//validimi i password-it
	
	//nese fjalekalimi eshte i zbrazet
	if(empty($pass)) {
		$errorPassword = "Fusha e fjalekalimit duhet te plotesohet!";
		$login = false;
	}
	
	//nese fjalekalimi ka vlere, validoje ate
	else {
		//nese fjalekalimi per kete perdorues nuk eshte i sakte
		
		$query2 = "SELECT fjalekalimi FROM perdoruesi WHERE id = '$usernameID';";
		$query2Res = mysqli_query($connect, $query2);
		$query2Row = mysqli_fetch_array($query2Res);
		$passwordDB = $query2Row['fjalekalimi'];
		$pass1 = md5($pass);
		
		//nese vlerat e fjalekalimeve nuk perputhen
		if($pass1 != $passwordDB) {
			$errorPassword = "Fjalekalimi nuk eshte i sakte!";
			$login = false;
		}
	}
	
	//nese asnje gabim nuk ka ndodhur, atehere asnjehere nuk eshte plotesu asnje kusht qe perfaqeson nje gabim te ndodhur => variabla login ende e permban vleren fileestare true
	if($login == true) {
		//perdoruesi kyqet ne sistem, varesisht prej rolit te tij
		
		$query3 = "SELECT roli FROM perdoruesi WHERE id = '$usernameID';";
		$query3Res = mysqli_query($connect, $query3);
		$query3Row = mysqli_fetch_array($query3Res);
		$roli = $query3Row['roli'];
		
		$_SESSION['usernameID'] = $usernameID;
		$_SESSION['roli'] = $roli;
		
		//ridrejtoje ne faqen baze e cila mund te qaset pas kyqjes
		header("Location: home.php");
	}
}

?>