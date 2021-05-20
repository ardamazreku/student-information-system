<?php

//startimi i sesionit
session_start();

//nese perdoruesi eshte kyq
if(isset($_SESSION['usernameID']) && isset($_SESSION['roli'])) {
	//nese perdoruesi eshte admin, atehere paraqitja kete pamje te kesaj web faqeje
	if($_SESSION['roli'] == 1) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Regjistrimi Profesoreve</title>
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
		<div id="container">
            <?php include "Includes/template/nav.php";?> 
                    <?php
					
					//se pari na nevojitet te i krijojme (deklarojme) variablat qe permbajne mesazhet e gabimeve qe kane ndodhur para se ti perdorim
					$errorGen = $errorid = $errorroli = $erroremri= $errormbiemri = $erroremail = $errorpassword = $errorPassTooltip = ""; 
        
					$id = $roli = $emri = $mbiemri = $email = $password = "";

					//kushti if ne kete rast do te plotesohet vetem pasi klikohet butoni Submit ne formen
					if($_SERVER['REQUEST_METHOD'] == 'POST') {

						include 'Includes/functions/selectProf.php';
					}
					?>
            
				    <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                        <div>
                            <center><h1>Regjistrimi i  Profesoreve/Asistenteve </h1></center>
                        </div>    
                        <center><table class="exams">  
                            <br>
                            <tr style="float:right">
                                <td><input type="button" onClick= "location.href='updateProfngaAdmini.php';" value="Update Profesor" style="
                                text-decoration: none;
                                background-color:darkblue;
                                color: white;
                                padding: 10px 10px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;">
                                <input type="button" onClick= "location.href='deleteProf.php';" value="Delete Profesor" style="
                                text-decoration: none;
                                background-color:salmon;
                                color: white;
                                padding: 10px 10px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;"></td>
                            </tr> 
							<tr class="exams">
								<th class="exams">ID e Profesorit<br><input type = "text" name = "id" placeholder = "ID e profit" value="<?php echo $id;?>"></th>
								<th class="exams">Roli<br><input type = "text" name = "roli" placeholder = "Roli ne db" value="<?php echo $roli;?>"></th>
							</tr>
							<!--errors-->
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$errorid<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errorroli<span>";
								?>
								</td>
							</tr>        
							<tr class="exams">
								<th class="exams">Emri i Profesorit <br><input type = "text" name = "emri" placeholder = "Emri" value="<?php echo $emri;?>"></th>
								<th class="exams">Mbiemri i Profesorit<br><input type = "text" name = "mbiemri" placeholder = "Mbiemri" value="<?php echo $mbiemri;?>"></th>
							</tr>
							<!--errors-->
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$erroremri<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errormbiemri<span>";
								?>
								</td>
							</tr>                            
							<tr class="exams">
								<th class="exams">Email <br><input type = "text" name = "email" placeholder = "Email" value="<?php echo $email;?>"></th>
								<th class="exams"> Fjalekalimi <br><input type = "password" name = "password" placeholder = "Fjalekalimi" value="<?php echo $password;?>"></th>
							</tr>
							<!--errors-->
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$erroremail<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error' title = '$errorPassTooltip'>$errorpassword<span>";
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
						   <tr class="exams">
                               <td><input type="submit" name="submit" style="width:200%;"></td>
                           </tr>
				    </table></center>                            
				</form>
			</div>
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