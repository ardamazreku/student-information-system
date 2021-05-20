<?php

$usernameID = $_SESSION['usernameID'];

//konektimi me db
require "Includes/functions/connect.php";


echo "</table>";
	$querySemDeptStd = mysqli_query($connect, "SELECT departamenti, semestri FROM studenti WHERE id = '$usernameID';");
	$rowSemDeptStd = mysqli_fetch_assoc($querySemDeptStd);
	$semestri = $rowSemDeptStd['semestri'];
	$departamenti = $rowSemDeptStd['departamenti'];
	$selectQuery = "SELECT l.emri AS lenda, l.kodi AS kodiLnd ,concat('Ligjeratat:',l.GrI_koha ,' Ushtrimet: ',l.ushtrimet_GrI,' ',l.ditet,' Klasa:',l.klasa) as orari 
					FROM lenda l, rezultatet r 
				WHERE r.studenti = '$usernameID' AND r.semestri = '$semestri' 
					AND l.kodi = r.lenda;";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);

echo "<table class = 'exams'>
		<tr class = 'exams'>
			<th class = 'exams'>Lendet</th>
			<th class = 'exams'>Kodi</th>
			<th class = 'exams'></th>
		</tr>";
		
if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "<tr class = 'exams'>
			<td class = 'exams' colspan = '5'>Nuk ka te dhena</td>
		</tr>";
}

while($row = mysqli_fetch_assoc($selectQueryRes)) {
	//marrja e te dhenave prej rreshtave rezultat ne secilin iterim te ciklit while
	$lenda = $row['lenda'];
	$kodiLnd = $row['kodiLnd'];
	$orari=$row['orari'];

	
	//keto te dhena i vendosim neper qelizat e tabeles se krijuar ne HTML
	echo "<tr class = 'exams'>
			
			<td class = 'exams'><input type='checkbox' class='checks' value='$orari'>$lenda</input></td>";
			
			
	echo "</tr>";
}


echo "</table>";
?>
<br>
<a href="#" onclick="getValue();return false;" class="btn">Grupet</a>
<script>
function getValue()
{
	var checks=document.getElementsByClassName('checks');
	var str='';
	
	for(i=0;i<5;i++)
	{
		if(checks[i].checked===true){
			str +=checks[i].value + " ";
			
		}
	}
	alert(str)
	
}
</script>
?>