<?php


require "connect.php";

	$id = $_POST['id'];
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$email = $_POST['email'];
	$fjalkalimi = $_POST['fjalkalimi'];
	$titulli=$_POST['titulli'];


$queryID = mysqli_query($connect, "SELECT id FROM profesori WHERE id='$id'");
$countID = @mysqli_num_rows($queryID);
$queryEmail = mysqli_query($connect, "SELECT email FROM perdoruesi WHERE email='$email'");
$countEmail = @mysqli_num_rows($queryEmail);

//variabla $register tregon nese mund te kryejme regjistrimin e studentit apo jo, varesisht nga vlera e saj meqe eshte boolean-e
//kudo qe ka gabime variabla $register e merr vleren false (dmth mbishkruhet vlera fillestare true me false)
$register = true;

//ne vazhdim do te shikojme vetem rastet kur ka ndodhur ndonje gabim gjate plotesimit te formes te cilen po e validojme (per te dhenat e saj aktuale)
//nese asnjera nga fushat e formes nuk eshte e plotesuar
if(empty($mbiemri) && empty($emri) && $id == "Perzgjidh departamentin" && empty($email) && empty($fjalkalimi) && empty($titulli)) {
	$errorGen = "Te gjitha fushat duhet te plotesohen!";
	$register = false;
}

//nese te pakten njera nga fushat permban nje vlere perkatese, na nevojitet ta validojme ate vlere
else {
	//nese fusha e emrit eshte e zbrazet
	if(empty($emri)) {
		$erroremri = "Fusha e emrit duhet te plotesohet!";
		$register = false;
	}
	
	//emri ka vlere, validoje ate
	else {
		//nese emri permban edhe karaktere tjera jo-shkronje
		if(!preg_match("/^[a-zA-Z ]*$/", $emri)) {
			$erroremri = "Emri duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
	
	//nese fusha e mbiemrit eshte e zbrazet
	if(empty($mbiemri)) {
		$errormbiemri = "Fusha e mbiemrit duhet te plotesohet!";
		$register = false;
	}
	
	//mbiemri ka vlere, validoje ate
	else {
		//nese mbiemri permban edhe karaktere tjera jo-shkronje
		if(!preg_match("/^[a-zA-Z ]*$/", $mbiemri)) {
			$errormbiemri = "Mbiemri duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
	
	
	if($id == "Perzgjidh id-ne") {
		$errorid = "Fusha e id-se duhet te plotesohet!";
		$register = false;
	}
	
	//nese fusha e email adreses eshte e zbrazet
	if(empty($email)) {
		$erroremail = "Fusha e email adreses duhet te plotesohet!";
		$register = false;
	}
	
	//email adresa ka vlere, validoje ate
	else {
		//nese formati i email adreses se shenuar nuk eshte i sakte
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$erroremail = "Formati i email adreses nuk eshte i sakte!";
			$register = false;
		}
		//nese ekziston nje perdorues qe e ka kete email adrese
		else if($countEmail != 0) {
			$erroremail = "Ky email tashme ekziston!";
			$register = false;
		}
	}
	
	
	if(empty($titulli)) {
		$errortitulli= "Fusha e titullit duhet te plotesohet!";
		$register = false;
	}
	
	
	else {
		
		if(!preg_match("/^[a-zA-Z ]*$/", $titulli)) {
			$errortitulli = "Titulli duhet te permbaje vetem shkronja!";
			$register = false;
		}
	
	}
	
	//nese fusha e fjalekalimit eshte e zbrazet
	if(empty($fjalkalimi)) {
		$errorfjalkalimi = "Fusha e fjalekalimit duhet te plotesohet!";
		$register = false;
	}
	
	//fjalekalimi ka vlere, validoje ate
	else {
		$uppercase = preg_match("@[A-Z]@", $fjalkalimi);
		$lowercase = preg_match("@[a-z]@", $fjalkalimi);
		$number = preg_match("@[0-9]@", $fjalkalimi);
		$specialChars = preg_match("@[^\w]@", $fjalkalimi);
		
		//nese fjalekalimi eshte i dobet
		//nese nuk plotesohet njeri nga kushtet e meposhtem atehere konsiderohet qe fjalekalimi eshte i dobet
		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($fjalkalimi) < 8) {
			$errorfjalkalimi = "Fjalekalim i dobet!";
			//$errorPassTooltip = "Fjalekalimi duhet te permbaje te pakten 8 karaktere dhe duhet te perfshije te pakten nje shkronje te madhe, nje numer dhe nje karakter special!";
			$register = false;
		}
	}
	
	if($register == true) {
		
		$updateQuery = "UPDATE perdoruesi
					SET emri='$emri', mbiemri='$mbiemri',email='$email',fjalekalimi=md5('$fjalkalimi')
					WHERE id = '$id' AND roli=2;";
		$updateQuery .= "Update profesori
			set titulli='$titulli' where id='$id'";
		
		
		if (mysqli_multi_query($connect, $updateQuery)) {
			echo '<script type="text/javascript">';
            echo 'alert("Profesori u be Update me sukses!")';  
            echo '</script>';
		}
		else {
            echo '<script type="text/javascript">';
            echo 'alert("Ka ndodhur nje gabim ne Update!")';  
            echo '</script>';
		}
	}
}
?>