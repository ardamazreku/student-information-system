<?php session_start();

//nese perdoruesi eshte kyq
if(isset($_SESSION['usernameID']) && isset($_SESSION['roli'])) {
	//nese perdoruesi eshte student, atehere paraqitja kete pamje te kesaj web faqeje
	if( $_SESSION['roli'] == 3) {
?>

<?php

    $usernameID= $_SESSION['usernameID'];

?>
    
<!DOCTYPE html>
<html>
    <head>
    <title>Orari</title>
    <meta charset="UTF-8"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
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
        <h1>Perpilimi Orarit</h1>
        <?php require_once "Includes/functions/deleteOrariDB.php"; ?>
        <?php
            $result=mysqli_query($connect,"Select * from orari o ,lenda l where o.studenti='$usernameID' and l.kodi=o.lenda;");
        ?>
            <div>
                <table class="table">
                <th>
                <tr>
                <th>Lenda</th>
                <th>Ligjeratat</th>
                <th>Ushtrimet</th>
                <th>Klasa</th>
                <th>Dita</th>
                <th>Terminet e lira</th>
                <th>Dita lire</th>
                <th>Klasa lire</th>
                </tr>
                </th>
                <?php

                while($row=$result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php  echo $row['emri'];?></td>
                    <td><?php  echo $row['ligjeratat'];?></td>
                    <td><?php  echo $row['ushtrimet'];?></td>
                    <td><?php  echo $row['klasa'];?></td>
                    <td><?php  echo $row['dita'];?></td>
                    <td><?php  echo $row['terminet_e_lira'];?></td>
                    <td><?php  echo $row['dita_lire'];?></td>
                    <td><?php  echo $row['klasa_lire'];?></td>
                    <td><br>
                    <a href="Includes/functions/ndryshoOrarin.php?edit=<?php echo $row['id'];?>" class="btn" style="background-color:lightblue">Ndrysho</a>
                    <a href="Includes/functions/deleteOrariDB.php?delete=<?php echo $row['id'];?>" class="btn" style="background-color:red">Delete</a>
                    </td>
                </tr>
                <?php endwhile;?>
                </table>
            </div>
        </div>   
    </body>
</html>

<?php
}
 else
 {
    header("Location: home.php");
  }
  }
  //nese perdoruesi nuk eshte kyq ridrejtoje ne faqen e logimit
  else {
    header("Location: login.php");
  }
?>