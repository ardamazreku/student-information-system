<?php
//startimi i sesionit
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/logopng.png" type="image/gif" sizes="16x16">
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
        <div class="container">           
            <?php include "Includes/template/nav.php";?> 
			<?php include "Includes/template/header.php";?>
			<div class="content main">
				<div class="sec">
					<h3>Libraria e vogel ne Universitet</h3><br>
					<img src="images/library.jpg" class="foto"> 
                    <br>
                    <p>Gjithmonë për t’u ndarë, asnjëherë për t’u shitur!
                    <br>
                    ECD vendosi librarinë e hapur në kampusin e Universiteti "Ukshin Hoti" Prizren.
                    <br>
                    Libraria e 81,341 me radhë në Botë, ndërsa e para e llojit të tillë në Kosovë!</p>
                    <br>
                    <br>
                    <p> 24/03/2020 <a href="index.php" class="lexo">Lexo me shume...</a></p>
				</div>
                <br>
				<div class="sec">
					<h3>Njoftim në lidhje me veprimet e nevojshme, përkitazi me situatën e krijuar pas paraqitjes së rasteve të COVID-19</h3><br>
					<img src="images/covid.jpg" class="foto"> 
                    <br>
                    <p>Menaxhmenti i Universitetit “Ukshin Hoti” në Prizren, në zbatim të vendimit të Qeverisë së Republikës së Kosovës të datës 13.03.2020, për marrjen e masave shtesë pas konfirmimit të rasteve pozitive me Corona Virus COVID-19, do të veprojë si në vijim:</p>
                    <br>
                    <p> 16/03/2020 <a href="index.php" class="lexo">Lexo me shume...</a></p>
                </div>
                <br>
                <div class="sec">
					<h3>Në Universitetin "Ukshin Hoti" u mbajt takimi online me grupin e ekspertëve ndërkombëtar</h3><br>
					<img src="images/lajm2.jpg" class="foto"> 
                    <br>
                    <p>Prezentë në takim ishin edhe zyrtarët e Agjencisë së Kosovës për Akreditim, të udhëhequr nga drejtori, Naim Gashi, si koordinator të këtij procesi. Në të gjitha grupet në bazë të agjendës janë prezantuar të arriturat e Universitetit.</p>
                    <br><br>
                    <p> 15/03/2020 <a href="index.php" class="lexo">Lexo me shume...</a></p>
                </div>
            </div>    
			<?php include "Includes/template/aside.php"?>
			<?php include "Includes/template/footer.php";?>
		</div>
        <script src="javascript/app.js"></script>
	</body>
</html>