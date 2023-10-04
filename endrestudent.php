<!DOCTYPE html>
<head>
  <title>Hjem  Obligatorisk oppgave 1</title>
  <link rel="stylesheet"  type="text/css" href="style1.css" media="screen"/>

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
    <h1>Endre student</h1>

    <div class="inputData"> 
 
    <form method="post" action="" id="finnStudentSkjema" name="finnStudentSkjema">
    Student 
    <select name="brukernavn" id="brukernavn">
    <?php print("<option value=''>velg brukernavn  </option>");
 include("dynamiske-funksjoner.php"); listeboksStudent(); ?>
 </select> <br/>
    <input type="submit" value="Finn student" name="finnStudentKnapp" id="finnStudentKnapp">
</form>

</div>

<?php 
 
if (isset($_POST ["finnStudentKnapp"]))  
{ 
  include("247053-tilkobling.php");  /* tilkobling til database-server og valg av database utført */ 
  $brukernavn=$_POST ["brukernavn"];  

  $sqlSetning="SELECT * FROM Student WHERE brukernavn ='$brukernavn';"; 
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 

  $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */ 
  $brukernavn=$rad["brukernavn"]; 
  $fornavn=$rad["fornavn"]; 
  $etternavn=$rad["etternavn"];
  $klassekode=$rad["klassekode"];

  print("<br />"); 
  print ("<form method='post' action='' id='finnStudentSkjema' name='finnStudentSkjema'>"); 
  print ("brukernavn <input type='text' value='$brukernavn' name='brukernavn' id='brukernavn'  
      readonly /> <br />"); 
     
  print ("fornavn <input type='text' value='$fornavn' name='fornavn' id='fornavn'  
      required /> <br />"); 
  print ("etternavn <input type='text' value='$etternavn' name='etternavn' id='etternavn'  
  required /> <br />"); 
  print ("klassekode <select name='klassekode' id='klassekode'>");  
  listeboksKlassekode($klassekode); print(" </select>  <br/>"); 
     
  print ("<input type='submit' value='endre student' name='endreStudentKnapp' id='endreStudentKnapp'>"); 
  print ("</form>"); 
} 
 ?>

<?php 
  if (isset($_POST ["endreStudentKnapp"]))  
    { 
      $brukernavn=$_POST ["brukernavn"]; 
      $fornavn=$_POST ["fornavn"];
      $etternavn=$_POST ["etternavn"];
      $klassekode=$_POST ["klassekode"];
  
      if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode) 
        { 
          print ("Alle felt m&aring; fylles ut");  
 
        } 
      else 
        { 
          include("247053-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */ 
 
          $sqlSetning="UPDATE Student SET fornavn='$fornavn',etternavn='$etternavn',klassekode='$klassekode' WHERE brukernavn='$brukernavn';";
          mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen");  
            /* SQL-setning sendt til database-serveren */ 
 
          print ("Student med klassekode $brukernavn er n&aring; endret<br />"); 
        } 
    } 
    
?> 

<div class="footer">
  <p>Alan Kamil Czubak</p>
  </div>

  </div>
</body>
</html>