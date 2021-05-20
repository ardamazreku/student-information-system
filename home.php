<?php

//startimi i sesionit
session_start();

//nese perdoruesi eshte kyq ne sistem, atehere paraqitja kete pamje te web faqes
if(isset($_SESSION['usernameID'])) {

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
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
					<h3>Faleminderit!</h3>
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

//nese nuk eshte kyq, atehere ridrejtoje ne faqen baze para kyqjes
else {
	header("Location: login.php");
}

?>