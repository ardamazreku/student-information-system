<?php

//startimi i sesionit
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Contact</title>
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
        <?php include "Includes/template/header.php";?>
        <div class="container">
            <div class="sec" style="padding:50px">
                <b><p style="color:darkgoldenrod; font-size:25px"> Kontaktoni Universitetin e Prizrenit </p></b>
                <br>
                <p>Universitetin e Prizrenit (Rektoratin) mund ta kontaktoni ne adresen e meposhtme. Gjithashtu te gjithe  ata qe kan ndonje vrejtje apo sugjerim mund te na kontaktoni ne adresen e meposhtme:</p>
                <center><address>
                ADRESA <br>
                Rruga e Shkronjave, nr. 1 <br>
                20000 Prizren, <br>
                Republika e Kosovës <br>
                <br>
                KONTAKTI <br>
                Tel: 029 232-140 <br>
                Email: rektorati@uni-prizren.com (Rektorati)
                </address>  
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2955.3931633472366!2d20.72309521545145!3d42.20604097919758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13539568c10cb73b%3A0xd44ac5c9587da9e7!2sUniversity%20of%20Prizren!5e0!3m2!1sen!2s!4v1590608517385!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> 
                    </div>
                </div>
                </center>    
            </div>              
        </div>
        <?php include "Includes/template/footer.php";?>
        <script src="javascript/app.js"></script>
    </body>    
</html>