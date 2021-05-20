<?php 

session_start();

//nese perdoruesi eshte kyq
if(isset($_SESSION['usernameID']) && isset($_SESSION['roli'])) {
	//nese perdoruesi eshte student, atehere paraqitja kete pamje te kesaj web faqeje
	if( $_SESSION['roli'] == 1) {

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Regjistrimi i Orarit</title>
    <meta charset="UTF-8"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
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
            <?php include "Includes/template/nav.php";?>
                    <?php
					
					//se pari na nevojitet te i krijojme (deklarojme) variablat qe permbajne mesazhet e gabimeve qe kane ndodhur para se ti perdorim
					$errorGen = $errorid = $errorushtrimet = $errordita= $errorterminet = $errorklasa = $errorligjeratat = $errorlenda = $errorstudenti = $errorditael = $errorklasael = ""; 
        
					$id = $ushtrimet = $dita = $terminet = $klasa = $ligjeratat = $ditael = $klasael = "";
                    $lenda =  "Perzgjidh lenden";
                    $studenti = "Perzgjidh studentin";
        
					//kushti if ne kete rast do te plotesohet vetem pasi klikohet butoni Submit ne formen
					if($_SERVER['REQUEST_METHOD'] == 'POST') {

						include 'Includes/functions/selectPerpilimiOraritNgaAdmini.php';
					}
					?>
            
				<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                <div>
                    <center><h1> Regjistrimi i orarit </h1></center>
                </div><br>
                        <center><table class="exams">    
                            <tr class="exams" style="float:right">
                                <td><input type="button" onClick= "location.href='updateOrariNgaAdmini.php';" value="Update Orari" style="
                                text-decoration: none;
                                background-color:darkblue;
                                color: white;
                                padding: 10px 10px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;">
                                <input type="button" onClick= "location.href='deleteOraringaAdmini.php';" value="Delete Orari" style="
                                text-decoration: none;
                                background-color:salmon;
                                color: white;
                                padding: 10px 10px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;"></td>
                            </tr>  
							<tr class="exams">
								<th class="exams">ID e Orarit<br><input type = "text" name = "id" placeholder = "ID e orarit" value="<?php echo $id;?>"></th>
								<th class="exams">Ligjeratat<br><input type = "text" name = "ligjeratat" placeholder = "Orari i Ligjerates" value="<?php echo $ligjeratat;?>"></th>
							</tr>
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$errorid<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errorligjeratat<span>";
								?>
								</td>
							</tr>   
							<tr class="exams">
								<th class="exams">Ushtrimet<br><input type = "text" name = "ushtrimet" placeholder = "Orari i Ushtrimeve" value="<?php echo $ushtrimet;?>"></th>
								<th class="exams">Klasa<br><input type = "text" name = "klasa" placeholder = "Klasa" value="<?php echo $klasa;?>"></th>
							</tr>
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$errorushtrimet<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errorklasa<span>";
								?>
								</td>
							</tr>
							<tr class="exams">
								<th class="exams">Dita<br><input type = "text" name = "dita" placeholder = "Dita e Ligjerates" value="<?php echo $dita;?>"></th>
								<th class="exams">Terminet e Lira<br><input type = "text" name = "terminetelira" placeholder = "Terminet e Lira" value="<?php echo $terminet;?>"></th>
							</tr>
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$errordita<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errorterminet<span>";
								?>
								</td>
							</tr>                          
                            <tr class ='exams'>
                                <th class ='exams'> Lenda <br>
                                    <select name = "lenda" style ="width:100%">
                                        <option value="<?php $lenda = "Perzgjidh lenden:";
                                        echo $lenda;?>">
                                        <?php echo $lenda;?></option>
                                        <?php include "Includes/functions/selectLendaOrar.php";?>			
                                    </select>
                                </th>
                                <th class ='exams'> Studenti <br>
                                    <select name = "studenti" style ="width:100%">
                                        <option  value="<?php $studenti = "Perzgjidh studentin:";
                                        echo $studenti;?>">
                                        <?php echo $studenti;?></option>
                                        <?php include "Includes/functions/selectStudentOrar.php";?>			
                                    </select>
                                </th>                        
                            </tr>
                            <tr>
                                <td class="exams">
								<?php
								echo "<span class='error'>$errorlenda<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errorstudenti<span>";
								?>
								</td>
                            </tr> 
                            <tr class="exams">
								<th class="exams">Dita e Lire<br><input type = "text" name = "ditalire" placeholder = "Dita e Lire" value="<?php echo $ditael;?>"></th>
								<th class="exams">Klasa e Lire<br><input type = "text" name = "klasalire" placeholder = "Klasa e Lire" value="<?php echo $klasael;?>"></th>
							</tr>
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$errorditael<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errorklasael<span>";
								?>
								</td>
							</tr>
                            <tr class="exams">
								<td>
								<?php
								echo "<span class='error'>$errorGen<span>";
								?>
								</td>
							</tr>
                            <tr>
                                <td><input type = "submit" name = "submit" value="Submit" style="width:200%;"></td>
                            </tr>
                    </table></center>    
                </form>    
        <?php include "Includes/template/footer.php";?>
    </body>
</html>

<?php
	}
	//nese perdoruesi nuk eshte student ridrejtoje ne faqen baze pas kyqjes
	else {
		header("Location: home.php");
	}
}
    //nese perdoruesi nuk eshte kyq ridrejtoje ne faqen e logimit
    else {
	   header("Location: login.php");
    }
?>