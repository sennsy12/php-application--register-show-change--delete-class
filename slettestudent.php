<!DOCTYPE html>
<head>
  <title>Hjem  Obligatorisk oppgave 1</title>
  <link rel="stylesheet"  type="text/css" href="style1.css" media="screen"/>
  <script src="funksjoner1.js"> </script> 


</head>
<body>
 
<div class="header">
  <h2>Innlevering 1</h2>
</div>


    <div class="meny">
<a class="active" href="index.php">Hjem</a>
<p>Klasse</p>
<a href="registrerklasse.php">Registrer klasse</a>
<a href="visalleklasser.php">Vis alle klasser</a>
<a href="endreklasse.php">Endre klasse</a>
<a href="sletteklasse.php">Slette klasse</a>

<p>Student</p>
<a href="registrerstudent.php">Registrer student</a>
<a href="visallestudenter.php">Vis alle studenter</a>
<a href="endrestudent.php">Endre student</a>
<a href="slettestudent.php">Slette student</a>
</div>

<div class="innhold">
    <h1>Slett student</h1>
 
    <div class="inputData"> 
 
    <form method="post" action="" name="slettStudentSkjema" id="slettStudentSkjema" onSubmit="return bekreft()">
    Student
    <select name="brukernavn" id="brukernavn">
        <?php print("<option value=''> velg student </option>");
include("dynamiske-funksjoner.php"); listeboksStudent(); ?>
</select> <br>
    <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp"/>
</form>

</div>
 
<?php 
  if (isset($_POST ["slettStudentKnapp"])) 
    { 
      include("247053-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */ 
      
      $brukernavn=$_POST ["brukernavn"]; 

    
      $sqlSetning="DELETE FROM Student WHERE brukernavn='$brukernavn';"; 
      mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen"); 
        /* SQL-setning sendt til database-serveren */ 
   
      print ("F&oslash;lgende student er n&aring; slettet: $brukernavn  <br />"); 
    } 
 
?> 


<div class="footer">
  <p>Alan Kamil Czubak</p>
  </div>

  </div>
</body>
</html>