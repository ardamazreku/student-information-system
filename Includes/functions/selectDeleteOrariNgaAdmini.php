<?php

//adminstratori i kyqur
$usernameID = $_SESSION['usernameID'];

//konektimi me db
require "Includes/functions/connect.php";

$selectQuery = "SELECT *
				FROM orari,lenda where kodi=lenda";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);

//marrja e te dhenave nga rreshtat rezultat

//krijimi i tabeles per vendosjen e te dhenave rezultat
echo "<table class = 'exams'>
		<tr class = 'exams'>
			<th class = 'exams'>Ligjeratat</th>
			<th class = 'exams'>Ushtrimet</th>
			<th class = 'exams'>Klasa</th>
			<th class = 'exams'>Dita</th>
			<th class = 'exams'>Lenda</th>
			<th class = 'exams'>Grupet</th>
			<th class = 'exams'>Terminet e lira</th>
			<th class = 'exams'>Klasat e lira</th>
			<th class = 'exams'>Ditet e lira</th>
			<th class = 'exams'></th>
			
		</tr>";
		
if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "<tr class = 'exams'>
			<td class = 'exams' colspan = '5'>Nuk ka te dhena</td>
		</tr>";
}

while($rreshti = mysqli_fetch_array($selectQueryRes)) {
	$id=$rreshti['id'];
	$ligjeratat=$rreshti['ligjeratat'];
	$ushtrimet = $rreshti['ushtrimet'];
	$klasa = $rreshti['klasa'];
	$dita = $rreshti['dita'];
	$lenda = $rreshti['emri'];
	$grupet = $rreshti['grupet'];
	$terminet = $rreshti['terminet_e_lira'];
	$dital = $rreshti['dita_lire'];
	$klasal = $rreshti['klasa_lire'];
	
	
	echo "<tr class = 'exams'>
			<td class = 'exams'>$ligjeratat</td>
			<td class = 'exams'>$ushtrimet</td>
			<td class = 'exams'>$klasa</td>
			<td class = 'exams'>$dita</td>
			<td class = 'exams'>$lenda</td>
			<td class = 'exams'>$grupet</td>
			<td class = 'exams'>$terminet</td>
			<td class = 'exams'>$dital</td>
			<td class = 'exams'>$klasal</td>
			<td class = 'exams'><a href = 'Includes/functions/deleteOrariNgaAdminiDB.php?id=$id' class = 'btn'>Delete</a></td>
		</tr>";
}

echo "</table>";
?>



