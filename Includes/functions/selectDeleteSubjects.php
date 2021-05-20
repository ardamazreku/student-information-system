<?php

//selektimi i lendeve qe mund te fshihen nga tabela lenda ne db, nga adminstratori i kyqur ne sistem

//adminstratori i kyqur
$usernameID = $_SESSION['usernameID'];

//konektimi me db
require "Includes/functions/connect.php";

//query per selektimin e lendeve per fshirjen
$selectQuery = "SELECT *
				FROM lenda";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);

//marrja e te dhenave nga rreshtat rezultat

//krijimi i tabeles per vendosjen e te dhenave rezultat
echo "<table class = 'exams'>
		<tr class = 'exams'>
			<th class = 'exams'>Kodi</th>
			<th class = 'exams'>Emri</th>
			<th class = 'exams'>Kredite</th>
			<th class = 'exams'>Statusi</th>
			<th class = 'exams'></th>
		</tr>";
		
if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "<tr class = 'exams'>
			<td class = 'exams' colspan = '5'>Nuk ka te dhena</td>
		</tr>";
}

while($rreshti = mysqli_fetch_array($selectQueryRes)) {
	$emri = $rreshti['emri'];
	$kodi = $rreshti['kodi'];
	$kredite = $rreshti['kredite'];
	$statusi = $rreshti['statusi'];
	
	echo "<tr class = 'exams'>
			<td class = 'exams'>$kodi</td>
			<td class = 'exams'>$emri</td>
			<td class = 'exams'>$kredite</td>
			<td class = 'exams'>$statusi</td>
			<td class = 'exams'><a href = 'Includes/functions/deleteSubjectsDB.php?kodiLnd=$kodi' class = 'btn'>Delete</a></td>
		</tr>";
}

echo "</table>";
?>