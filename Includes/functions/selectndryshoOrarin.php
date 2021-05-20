<?php

//selektimi i lendeve qe mund te fshihen nga tabela lenda ne db, nga adminstratori i kyqur ne sistem

//adminstratori i kyqur
session_start();
$usernameID = $_SESSION['usernameID'];

//konektimi me db
require "connect.php";

$querySemDeptStd = mysqli_query($connect, "SELECT departamenti, semestri FROM studenti WHERE id = '$usernameID';");
	$rowSemDeptStd = mysqli_fetch_assoc($querySemDeptStd);
	$semestri = $rowSemDeptStd['semestri'];
	$departamenti = $rowSemDeptStd['departamenti'];
	$query="SELECT l.kodi,l.emri,o.ligjeratat,o.ushtrimet,o.terminet_e_lira
	 from lenda l,rezultatet r,orari o,grupet g WHERE 
	r.studenti = '$usernameID' AND r.semestri = '$semestri' AND l.kodi = r.lenda AND 
	 r.grupet=g.id AND o.grupet=g.id AND o.lenda=l.kodi;";
	$queryRes=mysqli_query($connect,$query);
	
	
	echo "<table class = 'exams'>
		<tr class = 'exams'>
			<th class = 'exams'>Kodi</th>
			<th class = 'exams'>Lendet</th>
			<th class = 'exams'>Ligjeratat</th>
			<th class = 'exams'>Ushtrimet</th>
			<th class = 'exams'>------</th>
			<th class = 'exams'>Terminet e lira</th>
			<th class = 'exams'></th>
		</tr>";
		
if(mysqli_num_rows($queryRes) == 0) {
	echo "<tr class = 'exams'>
			<td class = 'exams' colspan = '5'>Nuk ka te dhena</td>
		</tr>";
}

while($row = mysqli_fetch_assoc($queryRes)) {
	//marrja e te dhenave prej rreshtave rezultat ne secilin iterim te ciklit while
	$lenda = $row['emri'];
	$kodi=$row['kodi'];
	$ligj=$row['ligjeratat'];
	$ush=$row['ushtrimet'];
	$terminet=$row['terminet_e_lira'];
	


	echo "<tr class = 'exams'>
			
			<td class = 'exams'>$kodi</td>
			<td class = 'exams'>$lenda</td>
			<td class = 'exams'>$ligj</td>
			<td class = 'exams'>$ush</td>
			<td class = 'exams'></td>
			<td class = 'exams'>$terminet</td>
			
			";
			
			
	echo "</tr>";
	
	}

?>

<br><br>
<html>
<head>
</head>
<body>
<form action="ndryshoOrarin.php" method="POST">
Ligjeratat:<input type="text" name="grupipare">
<input type="submit" name="bttn" value="Ndrysho">
</form>
</body>
</html>