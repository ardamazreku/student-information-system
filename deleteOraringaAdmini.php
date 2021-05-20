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
		<title>Delete Orari</title>
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
			<div class="content main">
				<div class="sec" style="width:1600px">
					<h1>Delete Orari</h1><br>
                    <input type="button" onClick= "location.href='perpilimioraritngaadmin.php';" value="Insert Orari" style="text-decoration: none;
                                background-color:darkblue;
                                color: white;
                                padding: 10px 10px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;">
                    <input type="button" onClick= "location.href='updateOrariNgaAdmini.php';" value="Update Orari" style="text-decoration: none;
                                background-color:salmon;
                                color: white;
                                padding: 10px 10px;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;"><br><br>
					<?php
					include "Includes/functions/selectDeleteOrariNgaAdmini.php";
					?>
				</div>
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
}?>