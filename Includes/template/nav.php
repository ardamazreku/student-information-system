<div class="nav">
    <a href="index.php"><p style="padding-left:10px;"> UNIVERSITETI "UKSHIN HOTI" </p></a>
    <ul class="nav-links">
	   <li><a href="index.php">Home</a></li>
	   <li><a href="about.php">About</a></li> 
       <li><a href="contact.php">Contact</a></li>
    </ul>
    <div class="mobile-menu"> 
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
	
	<?php
		//nese perdoruesi nuk eshte kyq ne sistem
		if(!isset($_SESSION['usernameID'])) {
			echo '<ul class="nav-links"><li><a href="login.php">Login</a></li></ul>';
		}
		
		//nese perdoruesi eshte kyqur ne sistem
		else {
			if(isset($_SESSION['roli'])) {
				//student
				if($_SESSION['roli'] == 3) {
					echo '<ul class="nav-links">
                          <li><a href="registerExams.php">Register Exams</a></li>
				          <li><a href="submitExams.php">Submit Exams</a></li>
						  <li><a href="orari.php">Orari</a></li>
						  <li><a href="perpilimOrari.php"> Perpilimi Orarit</a></li></ul>';
				}
				
				//profesor
				else if($_SESSION['roli'] == 2) {
					echo '<ul class="nav-links">
                          <li><a href="submitGrades.php">Submit Grades</a></li>
					      <li><a href="orariProfesoreve.php">Orari</a></li></ul>';
						
				}
				
				//administrator
				else if($_SESSION['roli'] == 1) {
					echo '<ul class="nav-links">
                          <li><a href="register.php">STUDENTET</a></li>
					      <li><a href="registerProfesor.php">PROFESORET</a></li>
					      <li><a href="registerLendet.php">LENDET</a></li>
						  <li><a href="perpilimioraritngaadmin.php">ORARI</a></li></ul>';
				}
			}
			
			echo '<a href = "Includes/validate/logout.php">Logout</a>';
		}
	?>
</div>