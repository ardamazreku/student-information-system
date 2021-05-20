<?php

//konektimi me db (i nevojshem)
require "connect.php";

$query = mysqli_query($connect, "SELECT id FROM profesori");

//tani na nevojitet te i marrim keto rreshta rezultat nga query i ekzekutuar
//CONCAT(p.id,' ',p.emri,' ',p.mbiemri) as prof FROM perdoruesi p, profesori pr WHERE p.id=pr.id AND p.roli=2
//meqe rezultati permban disa rreshta si rezultat qe kthehen nga query i ekzekutuar me larte, atehere duhet te iterojme ne secilin rresht me nje cikel
while($row = @mysqli_fetch_assoc($query)) { //ne secilin iterim variabla $row do te permbaje nje rresht rezultat nga vargu i rezultateve te kthyera
	//meqe funksioni i perdorur mysqli_fetch_assoc na kthen rreshtat rezultat si varg asociativ, atehere na duhet te marrim vetem vleren e atributut emri te tabeles departamenti
	$id = $row['id'];
	
	//vendosja e te dhenave te marra ne etiketat <option> ne HTML
	echo "<option value = '$id'>$id </option>";
}
?>