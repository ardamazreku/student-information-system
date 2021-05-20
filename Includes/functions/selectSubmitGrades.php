<?php

//selektimi i provimeve te te cilat profesori i kyqur ne sistem, duhet te vendose notat

//profesori i kyqur
$usernameID = $_SESSION['usernameID'];

//konektimi me db
require "Includes/functions/connect.php";

//query per selektimin e provimeve ku duhet te vendosen notat per studentet qe e kane paraqitur provimin
$selectQuery = "SELECT l.emri AS lenda, l.kodi AS kodiLnd, d.emri AS departamenti, 
					d.id AS idDept, r.semestri AS idSem, r.studenti AS idStd, nota, notuar
				FROM rezultatet r, lenda l, departamenti d 
				WHERE profesori = '$usernameID' AND paraqitur = 1 AND (pranuar = 0 OR refuzuar = 1)
					AND r.lenda = l.kodi AND d.id = r.departamenti ORDER BY lenda, notuar ASC;";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);

echo "<table class = 'exams'>
		<tr class = 'exams'>
			<th class = 'exams'>Lenda</th>
			<th class = 'exams'></th>
			<th class = 'exams'>Departamenti</th>
			<th class = 'exams'></th>
			<th class = 'exams'>Studenti</th>
			<th class = 'exams'></th>
			<th class = 'exams'></th>
			<th class = 'exams'>Nota</th>
			<th class = 'exams'></th>
		</tr>";

if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "<tr class = 'exams'>
			<td class = 'exams' colspan = '9'>Nuk ka te dhena</td>
		</tr>";
}
	
//marrja e rreshtave rezultat
while($rreshti = mysqli_fetch_assoc($selectQueryRes)) {
	//marrja e te dhenave neper qelizat e rreshtave rezultat
	$lenda = $rreshti['lenda'];
	$departamenti = $rreshti['departamenti'];
	$idStd = $rreshti['idStd'];
	$kodiLnd = $rreshti['kodiLnd'];
	$idDept = $rreshti['idDept'];
	$idSem = $rreshti['idSem'];
	$nota = $rreshti['nota'];
	
	echo "<tr class = 'exams'>
			<form action = 'Includes/functions/submitGradesDB.php' method = 'POST'>
				<td class = 'exams'><input type = 'text' value = '$lenda' readonly></td>
				<td class = 'exams'><input type = 'hidden' name = 'kodiLnd' value = '$kodiLnd' readonly></td>
				<td class = 'exams'><input type = 'text' value = '$departamenti' readonly></td>
				<td class = 'exams'><input type = 'hidden' name = 'idDept' value = '$idDept' readonly></td>
				<td class = 'exams'><input type = 'text' name = 'idStd' value = '$idStd' readonly></td>
				<td class = 'exams'><input type = 'hidden' name = 'idProf' value = '$usernameID' readonly></td>
				<td class = 'exams'><input type = 'hidden' name = 'idSem' value = '$idSem' readonly></td>";
				if($rreshti['notuar'] == 0) {
					echo "<td class = 'exams'>
						<select name = 'nota'>
							<option value = '5'>5</option>
							<option value = '6'>6</option>
							<option value = '7'>7</option>
							<option value = '8'>8</option>
							<option value = '9'>9</option>
							<option value = '10'>10</option>
						</select>
					</td>";
				}
				else {
					echo "<td class = 'exams'><input type = 'text' value = '$nota' readonly size = '2'></td>";
				}
				
				$query1 = "";
				
				if($rreshti['notuar'] == 0 || $nota == 'Ende pa notuar') {
					echo "<td class = 'exams'><input type = 'submit' value = 'Set grade'></td>";
				}
			echo "</form>
		</tr>";
}
echo "</table>";
?>