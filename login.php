<?php

//startimi i sesionit
session_start();

//nese perdoruesi nuk eshte kyq, atehere paraqitja kete pamje te kesaj web faqeje
if(!isset($_SESSION['usernameID'])) {

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
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
			<?php include "Includes/template/header.php";?>
			<div class="content main">
				<div class="sec">
					<h1>Login Form</h1>
					
					<?php
					
					$usernameID = "";
					
					$errorUsername = $errorPassword = $errorGen = "";
					
					if($_SERVER['REQUEST_METHOD'] == "POST") {
						//login
						include "Includes/validate/loginValidate.php";
					}
					?>
					<table>
						<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
							<tr>
								<td><input type = "text" name = "usernameLogin" placeholder = "Username" value = "<?php echo $usernameID;?>"></td>
							</tr>
							<!--errors-->
							<tr>
								<td><?php echo "<span class = 'error'>" . $errorUsername . "</span>";?></td>
							</tr>
							<tr>
								<td><input type = "password" name = "passLogin" placeholder = "Password"></td>
							</tr>
							<!--errors-->
							<tr>
								<td><?php echo "<span class = 'error'>" . $errorPassword . "</span>";?></td>
							</tr>
							<!--error-->
							<tr>
								<td><?php echo "<span class = 'error'>" . $errorGen . "</span>";?></td>
							</tr>
							<tr>
								<td><input type = "submit" style="width:50%;"></td>
							</tr>
						</form>
					</table>
				</div>
			</div>
			<?php include "Includes/template/aside.php"?>
			<?php include "Includes/template/footer.php";?>
		</div>
        <script src="javascript/app.js"></script>
	</body>
</html>

<?php
}
//nese perdoruesi eshte i kyqur
else {
	//atehere ridrejtoje ne faqen baze pas kyqjes
	header("Location: home.php");
}
?>