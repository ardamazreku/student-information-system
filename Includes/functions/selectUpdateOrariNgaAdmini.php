<?php

require "connect.php";

    $id=$_POST['id'];
    $ligjeratat=$_POST['ligjeratat'];
    $ushtrimet=$_POST['ushtrimet'];
    $klasa=$_POST['klasa'];
    $dita=$_POST['dita'];
    $terminet=$_POST['terminetelira'];
    $lenda=$_POST['lenda'];
    $studenti=$_POST['studenti'];
    $ditael=$_POST['ditalire'];
    $klasael=$_POST['klasalire'];

$queryID = mysqli_query($connect, "SELECT id FROM orari WHERE id='$id'");
$countKodi = @mysqli_num_rows($queryID);

$register = true;

if($id=="Perzgjidh ID:" && empty($ligjeratat) && empty($ushtrimet) && empty($klasa) && empty($dita) &&empty($terminet) && $lenda == "Perzgjidh lenden:" && $studenti == "Perzgjidh studentin:" &&      empty($ditael) && empty($klasael)) {
	   $errorGen = "Te gjitha fushat duhet te plotesohen!";
	   $register = false;
}
   
else {
    
    if(empty($ligjeratat)) {
        $errorligjeratat = "Fusha e orarit te ligjeratave duhet te plotesohet!";
		$register = false;
    }
    
    if(empty($ushtrimet)) {
        $errorushtrimet = "Fusha e orarit te ushtrimeve duhet te plotesohet!";
		$register = false;
    }
    
    if(empty($klasa)) {
        $errorklasa = "Fusha e klases duhet te plotesohet!";
		$register = false;
    }
    else {
        
        if(!is_numeric($klasa)) {
            $errorklasa = "Fusha e klases duhet te permbaje vetem numra!";
            $register = false;
        }
    }
    
    if(empty($dita)) {
		$errordita="Fusha e dites duhet te plotesohet!";
		$register = false;
	}
	
	else {
		
		if(!preg_match("/^[a-zA-Z ]*$/", $dita)) {
			$errordita="Fusha e dites duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
    
    if(empty($terminet)) {
        $errorterminet = "Fusha e termineve duhet te plotesohet!";
		$register = false;
    }
    
    if($id == "Perzgjidh ID:") {
		$errorid="Fusha e ID-se duhet te plotesohet!";
		$register = false;
	}

	if($lenda == "Perzgjidh lenden:") {
		$errorlenda= "Fusha e lendes duhet te plotesohet!";
		$register = false;
	}  
    
	if($studenti == "Perzgjidh studentin:") {
		$errorstudenti= "Fusha e studentit duhet te plotesohet!";
		$register = false;
	}
    
    if(empty($ditael)) {
		$errorditael="Fusha e dites se lire duhet te plotesohet!";
		$register = false;
	}
	
	else {
		
		if(!preg_match("/^[a-zA-Z ]*$/", $ditael)) {
			$errorditael="Fusha e dites duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
    
    if(empty($klasael)) {
        $errorklasael = "Fusha e klases se lire duhet te plotesohet!";
		$register = false;
    }
    else {
        
        if(!is_numeric($klasael)) {
            $errorklasael = "Fusha e klases duhet te permbaje vetem numra!";
            $register = false;
        }
    }
	
    if($register == true) {
        $update = "UPDATE orari SET
         ligjeratat ='$ligjeratat', ushtrimet ='$ushtrimet', klasa = '$klasa', dita = '$dita', terminet_e_lira ='$terminet', lenda = '$lenda', studenti = '$studenti', dita_lire = '$ditael', klasa_lire = '$klasael' where id='$id';";

        if (mysqli_query($connect, $update)) {
            echo '<script type="text/javascript">';
            echo 'alert("Orari u be Update me sukses!")';  
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