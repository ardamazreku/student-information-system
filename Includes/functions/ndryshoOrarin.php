<?php
require "connect.php";

$startdate=date('m/d/Y');
$enddate=('09/16/2020');

if($startdate<$enddate) {

     if(isset($_GET['edit'])){
        $id=$_GET['edit'];

        mysqli_query($connect,"update orari set ligjeratat=terminet_e_lira,dita=dita_lire,klasa=klasa_lire where id='$id'");

            echo '<script type="text/javascript">';
            echo 'alert("Orari u ndryshua me sukses.")';  
            echo '</script>';

    }

     else {
            echo '<script type="text/javascript">';
            echo 'alert("Insertimi nuk u realizua.")';  
            echo '</script>';
        }
}

else {
    echo '<script type="text/javascript">';
    echo 'alert("Ka kaluar afati per ndryshim te orarit!")';  
    echo '</script>';
}
//header("location:../../perpilimOrari.php");

?>