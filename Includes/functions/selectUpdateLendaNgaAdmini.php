<?php

//konektimi me db (i nevojshem)
require "connect.php";

 	$emri = $_POST['emri'];
    $kodi = $_POST['kodi'];
    $kredite = $_POST['kredite'];
    $statusi = $_POST['statusi'];
    $semestri = $_POST['semestri'];
    $nr = $_POST['nr'];
	$id=$_POST['id'];
    $grupet = $_POST['grupet'];

$queryID = mysqli_query($connect, "SELECT kodi FROM lenda WHERE kodi='$kodi'");
$countKodi = @mysqli_num_rows($queryID);


//variabla $register tregon nese mund te kryejme regjistrimin e studentit apo jo, varesisht nga vlera e saj meqe eshte boolean-e
//kudo qe ka gabime variabla $register e merr vleren false (dmth mbishkruhet vlera fillestare true me false)
$register = true;

//ne vazhdim do te shikojme vetem rastet kur ka ndodhur ndonje gabim gjate plotesimit te formes te cilen po e validojme (per te dhenat e saj aktuale)
//nese asnjera nga fushat e formes nuk eshte e plotesuar
if(empty($emri) && empty($kredite) && $semestri == "Perzgjidh semestrin" && $grupet == "Perzgjidh grupin" && $id == "Perzgjidh profesorin" && empty($statusi) && empty($nr)  && $kodi=="Perzgjidh kodin" ) 
{
	$errorGen = "Te gjitha fushat duhet te plotesohen!";
	$register = false;
}

//nese te pakten njera nga fushat permban nje vlere perkatese, na nevojitet ta validojme ate vlere
else {
	//nese fusha e emrit eshte e zbrazet
	if(empty($emri)) {
		$erroremri= "Fusha e emrit duhet te plotesohet!";
		$register = false;
	}
	
	//emri ka vlere, validoje ate
	else {
		//nese emri permban edhe karaktere tjera jo-shkronje
		if(!preg_match("/^[a-zA-Z ]*$/", $emri)) {
			$erroremri= "Emri duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
	if(empty($kredite)) {
		$errorkredite= "Fusha e kredis duhet te plotesohet!";
		$register = false;
	}
	
	else {
		
		if(!is_numeric($kredite)) {
			$errorkredite= "kredit duhet te permabjne vetem vetem numra!";
			$register = false;
		}
    }
    
    if(empty($statusi)) {
		$errorstatusi="Fusha e statusit duhet te plotesohet!";
		$register = false;
	}
	
	else {
		
		if(!preg_match("/^[a-zA-Z ]*$/", $statusi)) {
			$errorstatusi="Statusi duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
	
	if(empty($nr)) {
		$errornr= "Fusha e nr te studenteve duhet te plotesohet!";
		$register = false;
	}
	
	else {
		
		if(!is_numeric($nr)) {
			$errornr= "Nr studenteve duhet te permabje vetem vetem numra!";
			$register = false;
		}	
    }
	
	if($semestri == "Perzgjidh semestrin") {
		$errorsemestri="Fusha e semestrit duhet te plotesohet!";
		$register = false;
	}
	
	if($grupet == "Perzgjidh grupin") {
		$errorgrupet= "Fusha e grupit duhet te plotesohet!";
		$register = false;
	}
	if($id == "Perzgjidh profesorin") {
		$errorid="Fusha e prof duhet te plotesohet!";
		$register = false;
	}

	if($kodi == "Perzgjidh kodin") {
		$errorkodi="Fusha e kodit duhet te plotesohet!";
		$register = false;
	}
		
	if($register == true) {
				
		$update = "update lenda set emri='$emri',kredite='$kredite',statusi='$statusi',semestri_id='$semestri',
		nr_studenteve='$nr',nrgrup='$grupet',id_prof='$id' where kodi='$kodi';";
			
		if (mysqli_query($connect, $update)) {
            echo '<script type="text/javascript">';
            echo 'alert("Lenda u be Update me sukses!")';  
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