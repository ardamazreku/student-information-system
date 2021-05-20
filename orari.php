<?php session_start();

//nese perdoruesi eshte kyq
if(isset($_SESSION['usernameID']) && isset($_SESSION['roli'])) {
	//nese perdoruesi eshte student, atehere paraqitja kete pamje te kesaj web faqeje
	if( $_SESSION['roli'] == 3) {
?>
<?php

$usernameID = $_SESSION['usernameID'];



require "Includes/functions/connect.php";
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Orari</title>
    <meta charset="UTF-8"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">    
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/animate.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    </head>   


    <body>
    <a href="index.php"><img src="images/logopng.png" class="logo"/></a>
        <div class="searchbar" style="padding:30px"> 
            <form method="post">
            <label>
              <input type="search" name ="search" size="20" placeholder="Search...">
            </label>
            <label>
              <input type="submit" name="button"value="Search">
            </label>
            </form>
        </div>         
    <div id="container">
        <?php include "Includes/template/nav.php";?>
		 <h1>Orari</h1>
		
		 <?php
	$querySemDeptStd = mysqli_query($connect, "SELECT departamenti, semestri FROM studenti WHERE id = '$usernameID';");
	$rowSemDeptStd = mysqli_fetch_assoc($querySemDeptStd);
	$semestri = $rowSemDeptStd['semestri'];
	$departamenti = $rowSemDeptStd['departamenti'];
	$selectQuery = "SELECT l.emri AS lenda, l.kodi AS kodiLnd ,
	concat('Ligjeratat:',o.ligjeratat,' Ushtrimet: ',o.ushtrimet,' ',o.dita,' Klasa:',o.klasa) as orari 
	FROM lenda l,rezultatet r,orari o,grupet g
				WHERE r.studenti = '$usernameID' AND r.semestri = '$semestri' 
					AND l.kodi = r.lenda  and r.grupet=g.id and o.grupet=g.id and o.lenda=l.kodi;";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);


echo "<table class = 'exams'>
		<tr class = 'exams'>
			<th class = 'exams'>Lendet</th>
			<th class = 'exams'></th>
		</tr>";
		
if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "<tr class = 'exams'>
<form method='post' action='Includes/functions/zgjedhgr.php'>
			<select name='grupet'>
			<option value='0'>Perzgjidh grupin</option>
			<option value='1'>Grupi pare</option>
			<option value='2'>Grupi dyte</option>
			</select>
			<input type='submit' value='Zgjedh'/></form>
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
     
        </div>
    </body>
</html>

<?php
}
 else
 {
    header("Location: home.php");
  }
  }
  //nese perdoruesi nuk eshte kyq ridrejtoje ne faqen e logimit
  else {
  header("Location: login.php");
  }

?>