<?php

require "connect.php";

$startdate=strtotime('2020-08-29');
$enddate=strtotime('+2 weeks',$startdate);

if($startdate<$enddate) {

if(isset($_GET['delete'])){
	
	$id=$_GET['delete'];
	mysqli_query($connect,"Delete from orari where id='$id';");
    
    echo '<script type="text/javascript">';
    echo 'alert("Orari u fshi me sukses!")';  
    echo '</script>';
    
    }
}

else {
    echo '<script type="text/javascript">';
    echo 'alert("Ka kaluar afati per ndryshim te orarit!")';  
    echo '</script>';
}
?>