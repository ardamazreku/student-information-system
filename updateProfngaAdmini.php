
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
		<title>Update Profesoret</title>
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
					$errorGen = $errorid = $erroremri =$errormbiemri= $erroremail = $errorfjalkalimi = $errortitulli="";
										
					$emri = $mbiemri = $email = $fjalkalimi = $titulli = "";
					$id = "Perzgjidh id-ne";
					
					
					//kushti if ne kete rast do te plotesohet vetem pasi klikohet butoni Submit ne formen
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						//POST
						
						include 'Includes/functions/selectUpdateProf.php';
					}
					?>
				    <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                        <center><table class="exams">
                            <h1>Update Profesoret</h1><br>
                            <tr style="float:right">
                                <td><input type="button" onClick= "location.href='registerProfesor.php';" value="Insert Profesor" style="
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
								<th class="exams"> ID e Profit: <br>
									<select name = "id" style="width:100%">
										<option value="<?php echo $id;?>"><?php echo $id;?></option>
										<?php include "Includes/functions/selectProfLenda.php";?>
									</select>
								</th>
								<th class="exams">Emri i Profit <br> <input type = "text" name = "emri" placeholder = "Emri" value="<?php echo $emri;?>"></th>
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
								echo "<span class='error'>$erroremri<span>";
								?>
								</td>
							</tr>
							<tr class="exams">
                                <th class="exams">Mbiemri i Profit <br><input type = "text" name = "mbiemri" placeholder = "Mbiemri" value="<?php echo $mbiemri;?>"></th>
                                <th class="exams">Email <br><input type = "text" name = "email" placeholder = "Email" value="<?php echo $email;?>"></th>
                            </tr>
                            <!--errors-->
							<tr class="exams">
								<td class="exams">
								<?php
								echo "<span class='error'>$errormbiemri<span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$erroremail<span>";
								?>
								</td>
                            </tr>
                            <tr>
                                <th class="exams">Fjalekalimi<br><input type = "password" name = "fjalkalimi" placeholder = "Fjalkalimi" value="<?php echo $fjalkalimi;?>"></th>
                                <th class="exams">Titulli <br><input type = "text" name = "titulli" placeholder = "Titulli" value="<?php echo $titulli;?>"></th>
							</tr>
                            <tr>
                                <td class="exams">
								<?php
								echo "<span class='error'>$errorfjalkalimi</span>";
								?>
								</td>
								<td class="exams">
								<?php
								echo "<span class='error'>$errortitulli</span>";
								?>
								</td>
                            </tr>    
							<tr class="exams">
								<td>
								<?php
								echo "<span class='error'>$errorGen</span>";
								?>
								</td>
							</tr>
							<tr class="exams">
								<td><input type = "submit" name = "register" value="Submit" style="width:200%;"></td>
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