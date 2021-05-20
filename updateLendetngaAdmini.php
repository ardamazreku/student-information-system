<?php

//startimi i sesionit
session_start();

//nese perdoruesi nuk eshte kyq, atehere paraqitja kete pamje te kesaj web faqeje
if(isset($_SESSION['usernameID']) && isset($_SESSION['roli'])) {
	//nese perdoruesi eshte admin, atehere paraqitja kete pamje te kesaj web faqeje
	if($_SESSION['roli'] == 1) {
?> 

<!DOCTYPE html>
<html>
	<head>
		<title>Update Lendet</title>
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
					$errorGen = $errorkodi = $erroremri =$errorkredite= $errorstatusi = $errorsemestri = $errornr= $errorgrupet= $errorid="";
										
					$emri = $kredite = $statusi= $nr  = "";
					$kodi = "Perzgjidh kodin";
					$semestri = "Perzgjidh semestrin";
					$grupet = "Perzgjidh grupin";
					$id = "Perzgjidh profesorin";
							
					//kushti if ne kete rast do te plotesohet vetem pasi klikohet butoni Submit ne formen
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						//POST
						
						include 'Includes/functions/selectUpdateLendaNgaAdmini.php';
					}
					?>
                    <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
					   <center><table class="exams">
                            <h1>Update Lendet</h1><br>
                            <tr class="exams" style="float:right">
                                <td><input type="button" onClick= "location.href='registerLendet.php';" value="Insert Lenda" style="
                                text-decoration: none;
                                background-color:darkblue;
                                color: white;
                                padding: 10px 10px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;">
                                <input type="button" onClick= "location.href='deleteSubjects.php';" value="Delete Lenda" style="
                                text-decoration: none;
                                background-color:salmon;
                                color: white;
                                padding: 10px 10px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;"></td>
                            </tr> 
							<tr class="exams">
								<th class="exams"> Kodi <br>
									<select name = "kodi" style="width:100%">
										<option  value="<?php echo $kodi;?>"><?php echo $kodi;?></option>
										<?php include "Includes/functions/selectLendaUpdate.php";?>
									</select>
								</th>
								<th class="exams"> Emri <br>
                                <input type = "text" name = "emri" placeholder = "Emri" value="<?php echo $emri;?>"></th>
							</tr>
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$errorkodi<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$erroremri<span>";
								?>
								</td>
							</tr>
							<tr class="exams">
								<th class="exams"> Semestri <br>
									<select name = "semestri" style="width:100%">
										<option  value="<?php echo $semestri;?>"><?php echo $semestri;?></option>
										<?php include "Includes/functions/selectSemester.php";?>
									</select>
								</th>
								<th class="exams"> Grupet <br>
									<select name = "grupet" style="width:100%">
										<option  value="<?php echo $grupet;?>"><?php echo $grupet;?></option>
										<?php include "Includes/functions/selectGroup.php";?>
									</select>
								</th>
                            </tr>
                            <tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$errorsemestri<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errorgrupet<span>";
								?>
								</td>
							</tr>
                            <tr class="exams">
								<th class="exams"> Profesori <br>
									<select name = "id" style="width:100%">
										<option  value="<?php $id = "Perzgjidh profesorin"; echo $id;?>"><?php echo $id;?></option>
										<?php include "Includes/functions/selectProfLenda.php";?>
									</select>
								</th>
								<th class="exams"> Kredite <br>
                                <input type = "text" name = "kredite" placeholder = "Kredite" value="<?php echo $kredite;?>"></th>
							</tr>
                            <tr class="exams">
                                <td class="exams">
								<?php
								echo "<span class='error'>$errorid<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errorkredite<span>";
								?>
								</td>	
                            </tr>    
							<tr class="exams">
								<th class="exams"> Statusi <br>
                                    <input type = "text" name = "statusi" placeholder = "Statusi" value="<?php echo $statusi;?>"></th>
								<th class="exams"> Nr. i Studenteve <br>
                                    <input type = "text" name = "nr" placeholder = "Nr i studenteve"  value="<?php echo $nr;?>"></th>
							</tr>
							<!--errors-->
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$errorstatusi<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errornr<span>";
								?>
								</td>
							</tr>
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$errorGen<span>";
								?>
								</td>
							</tr>
							<tr>
								<td><input type = "submit" name = "register" value="Submit" style="width:50%;"></td>
                            </tr>
					</table></center>
                </form>
			<?php include "Includes/template/footer.php";?>
		</div>
        <script src="javascript/app.js"></script>
	</body>
</html>

<?php
	}
	//nese perdoruesi nuk eshte admin ridrejtoje ne faqen baze pas kyqjes
	else {
		header("Location: home.php");
	}
}
//nese perdoruesi nuk eshte kyq ridrejtoje ne faqen e logimit
else {
	header("Location: login.php");
}
?>