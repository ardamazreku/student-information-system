<?php

//startimi i sesionit
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>About</title>
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
                <b><p style="color:darkgoldenrod; font-size:25px"> Shkurt rreth Universitetit </p></b>
                <br>
                <p> Universiteti “Ukshin Hoti” me seli në Prizren, është themeluar me vendimin nr. 01/87 të Qeverisë së Republikës së Kosovës më datën 09.10.2009 si universiteti i dytë publik në Republikën e Kosovës i cili filloi me gjeneratën e parë të studentëve në vitin akademik 2009/10 përkatësisht më 01.10.2010.</p>
                <p>Kuvendi të Republikës së Kosovës më 30.05.2013 miratoi Statutin e Universitetit “Ukshin Hoti” me seli në Prizren.
                <br>
                Universiteti “Ukshin Hoti” me gjashtë njësitë akademike që ka aktualisht ofron studime në ciklin Baçelor dhe Master ndërsa në bazë të statutit i njëjti mund të organizoj edhe studime doktorale. Përveç Studimeve në gjuhën mësimore shqipe Universiteti ofron studime edhe në gjuhën mësimore turke dhe boshnjake.</p>
                <p> Universiteti trashëgon përvojën e ish Shkollës së Lartë Pedagogjike, paralele e ndarë e Prishtinës, që funksionon  nga tetori i vitit 1961,  më vonë si Fakultet i Edukimit dega në Prizren, tani Universiteti “Ukshin Hoti” Prizren.
                <br>
                Qyteti i Prizrenit, seli e këtij universiteti, me ligjin nr. 06L/-012 neni 4 pika 2 është shpalluar Kryeqyteti historik i Republikës së Kosovës, i cili njihet normalisht përveç për historikun e tij të pasur po ashtu edhe për multi etnicitet dhe trashëgimi e kulturë jo vetën në Republikën e Kosovës por edhe me gjerë.</p>
                <p> Qyteti i Prizrenit po ashtu është qyteti i dytë më i madh pas Prishtinës, i cili në bazë të statistikave është qyteti më i vizituar në vend, shtrihet në pjesën jugore të Republikës së Kosovës, duke qenë qyteti më i afërt me Republikën e Shqipërisë për shtetasit e të cilit ky qytet por edhe universiteti “Ukshin Hoti” janë mjaft joshës dhe atraktiv.
                <br>
                Universiteti i Prizrenit “Ukshin Hoti” në Prizren (UPZ) ka nisur punën në vitin 2010 pas vendimit të Qeverisë së Kosovës për themelim. Selia e Universiteti është në Prizren, njëri nga qytetet më të lashta të Kosovës. UPZ-ja është Universiteti i dytë publik në Kosovë. Në vitin 2010 numri i studentëve ishte afër 1.700, ndërsa tani në vitin 2020 numri i studentëve është rreth 4035 studentë aktiv. Universiteti është i akredituar nga viti 2010. Për herë të fundit i është nënshtruar procesit të akreditimit vitin e kaluar dhe është riakredituar. Momentalisht Universiteti ofron studime në ciklin Baçelor dhe Master.
                <br>
                <b>Programet e ciklit të parë të akredituara nga AKA janë:</b></p>
                <?php include "fakultetet.php";?> <!-- XML -->
                <p>Njëkohësisht, brenda një periudhe afatmesme, UUHP planifikon të hap edhe programet e studimeve të doktoratës. Në funksion të përmbushjes së këtij objektivi, UUHP është pjesë e projektit ndërkombëtar DIPHDICTKES (The development and implementation of PhD Curricula in ICT for Kosovo Education System) nën udhëheqjen e dy universiteteve prestigjioze, Linnaues University (LNU, Suedi) dhe NTNU (Norwegian University of Science and Technology, Norvegji).</p>
            </div>    
        </div>
        <?php include "Includes/template/footer.php";?>
        <script src="javascript/app.js"></script>
    </body>    
</html>