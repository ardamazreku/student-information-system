<?php

//startimi i sesionit
session_start();

//nese perdoruesi eshte kyq
if(isset($_SESSION['usernameID']) && isset($_SESSION['roli'])) {
	//nese perdoruesi eshte administrator, atehere paraqitja kete pamje te kesaj web faqeje
	if($_SESSION['roli'] == 1) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Delete Subjects</title>
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
			<div class="content main">
				<div class="sec">
					<h1>Fshirja e Lendeve</h1><br>
                    <input type="button" onClick= "location.href='registerLendet.php';" value="Insert Lenda" style="text-decoration: none;
                                background-color:darkblue;
                                color: white;
                                padding: 10px 10px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;">
                    <input type="button" onClick= "location.href='updateLendetngaAdmini.php';" value="Update Lenda" style="text-decoration: none;
                                background-color:salmon;
                                color: white;
                                padding: 10px 10px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;"><br><br>
					<?php
					require "Includes/functions/selectDeleteSubjects.php";
					?>
				</div>
			</div>
			<?php include "Includes/template/footer.php";?>
		</div>
	</body>
</html>

<?php
	}
	//nese perdoruesi nuk eshte administrator ridrejtoje ne faqen baze pas kyqjes
	else {
		header("Location: home.php");
	}
}
//nese perdoruesi nuk eshte kyq ridrejtoje ne faqen e logimit
else {
	header("Location: login.php");
}
?>