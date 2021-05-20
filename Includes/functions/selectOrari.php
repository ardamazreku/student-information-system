<?php

//selektimi i provimeve te te cilat profesori i kyqur ne sistem, duhet te vendose notat

//profesori i kyqur
$usernameID = $_SESSION['usernameID'];

//konektimi me db
require "Includes/functions/connect.php";

//query per selektimin e provimeve ku duhet te vendosen notat per studentet qe e kane paraqitur provimin
$selectQuery = "SELECT l.emri,
	concat('Ligjeratat:',o.ligjeratat,' Ushtrimet: ',o.ushtrimet,' ',o.dita,' Klasa:',o.klasa) as orari ,o.terminet_e_lira,
	o.dita_lire,o.klasa_lire,o.id
	FROM lenda l,rezultatet r,orari o,grupet g,profesori pr
				WHERE r.profesori = '$usernameID'
			AND l.kodi = r.lenda  and r.grupet=g.id and o.grupet=g.id and
			 o.lenda=l.kodi and r.profesori=pr.id;";
$selectQueryRes = mysqli_query($connect, $selectQuery);

echo "<table class = 'exams'>
		<tr class = 'exams'>
			<th class = 'exams'>Lenda</th>
			<th class = 'exams'>Orari</th>
			<th class = 'exams'>Terminet e lira</th>
			<th class = 'exams'>Dita lire</th>
			<th class = 'exams'>Klasa lire</th>
			</tr>";

if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "<tr class = 'exams'>
			<td class = 'exams' colspan = '9'>Nuk ka te dhena</td>
		</tr>";
}

//marrja e rreshtave rezultat
while($rreshti = mysqli_fetch_assoc($selectQueryRes)) {
	//marrja e te dhenave neper qelizat e rreshtave rezultat
	$lenda = $rreshti['emri'];
	$orari = $rreshti['orari'];
	$term= $rreshti['terminet_e_lira'];
	$dital= $rreshti['dita_lire'];
	$klasal= $rreshti['klasa_lire'];
	$id=$rreshti['id'];


	echo "<tr class = 'exams'>
			
				<td class = 'exams'>$lenda</td>
				<td class = 'exams'>$orari</td>
				<td class = 'exams'>$term</td>
				<td class = 'exams'>$dital</td>
				<td class = 'exams'>$klasal</td>
				<td class='exams'><a href='Includes/functions/ndryshoOrarin.php?edit=$id' class='btn' style='background-color:lightblue'>Ndrysho</a></td>
				
			";

			echo "
		</tr>";
}
echo "</table>";
?>


