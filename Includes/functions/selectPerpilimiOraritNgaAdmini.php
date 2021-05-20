<?php

require "connect.php";

$startdate=date('m/d/Y');
$enddate=('09/13/2020');

if($startdate<$enddate) {

    $id=$_POST['id'];
    $ligjeratat=$_POST['ligjeratat'];
    $ushtrimet=$_POST['ushtrimet'];
    $klasa=$_POST['klasa'];
    $dita=$_POST['dita'];
    $terminetelira=$_POST['terminetelira'];
    $lenda=$_POST['lenda'];
    $studenti=$_POST['studenti'];
    $ditalire=$_POST['ditalire'];
    $klasalire=$_POST['klasalire'];

$queryID = mysqli_query($connect, "SELECT id FROM orari WHERE id='$id'");
$countKodi = @mysqli_num_rows($queryID);

$register = true;

if(empty($id) && empty($ligjeratat) && empty($ushtrimet) && empty($klasa) && empty($dita) &&                empty($terminetelira) && $lenda == "Perzgjidh lenden:" && $studenti == "Perzgjidh studentin:" &&      empty($ditalire) && empty($klasalire)) {
	   $errorGen = "Te gjitha fushat duhet te plotesohen!";
	   $register = false;
}
   
else {
    
    if(empty($id)) {
        $errorid = "Fusha e ID-se duhet te plotesohet!";
		$register = false;
    }
    else {
        
        if(!is_numeric($id)) {
            $errorid= "ID-ja duhet te permbaje vetem numra!";
            $register = false;
        }
        else if($countKodi != 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Ky profesor/asistent tashme ekziston!")';  
            echo '</script>';
			$register = false;
		}
    }
    
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
    
    if(empty($terminetelira)) {
        $errorterminet = "Fusha e termineve duhet te plotesohet!";
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
    
    if(empty($ditalire)) {
		$errorditael="Fusha e dites se lire duhet te plotesohet!";
		$register = false;
	}
	
	else {
		
		if(!preg_match("/^[a-zA-Z ]*$/", $ditalire)) {
			$errorditael="Fusha e dites duhet te permbaje vetem shkronja!";
			$register = false;
		}
	}
    
    if(empty($klasalire)) {
        $errorklasael = "Fusha e klases se lire duhet te plotesohet!";
		$register = false;
    }
    else {
        
        if(!is_numeric($klasalire)) {
            $errorklasael = "Fusha e klases duhet te permbaje vetem numra!";
            $register = false;
        }
    }
	
    if($register == true) {
        $insert="INSERT INTO orari(id,ligjeratat,ushtrimet,klasa,dita,terminet_e_lira,lenda,studenti,dita_lire,klasa_lire)
		 VALUES ('$id','$ligjeratat','$ushtrimet','$klasa','$dita','$terminetelira','$lenda','$studenti','$ditalire','$klasalire')";
        
        if(mysqli_query($connect, $insert)) {
            echo '<script type="text/javascript">';
            echo 'alert("Orari u shtua me sukses.")';  
            echo '</script>';
        }
        else {
            echo '<script type="text/javascript">';
            echo 'alert("Orari nuk u shtua.")';  
            echo '</script>';
        }
    }
}
}

else {
    echo '<script type="text/javascript">';
    echo 'alert("Ka kaluar afati per ndryshim te orarit!")';  
    echo '</script>';
}
?>