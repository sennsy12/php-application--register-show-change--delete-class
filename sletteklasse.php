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
    <h1>Slett klasse</h1>
 
    <div class="inputData"> 
 
    <form method="post" action="" name="slettKlasseSkjema" id="slettKlasseSkjema" onSubmit="return bekreft()">
    Klasse
    <select name="klassekode" id="klassekode">
        <?php print("<option value=''>velg klasse </option>");
include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
</select> <br>
    <input type="submit" value="slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp">
</form>

</div>
 
<?php 
  if (isset($_POST ["slettKlasseKnapp"]))  
    { 
      include("247053-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */ 
    
      $klassekode=$_POST ["klassekode"]; 

      if (!$klassekode) 
        { 
          print ("Det er ikke valgt noe klassekode");  
 
        } 
      else 

        { 
   
      $sqlSetning="DELETE FROM Klasse WHERE klassekode='$klassekode';"; 
      mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen"); 
        /* SQL-setning sendt til database-serveren */ 
   
      print ("F&oslash;lgende student er n&aring; slettet: $klassekode  <br />"); 
    } 
  } 
 
?> 


<div class="footer">
  <p>Alan Kamil Czubak</p>
  </div>

  </div>
</body>
</html>