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
    <h1>Registrer student</h1>
 
    <div class="inputData"> 
    <form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">
        Brukernavn <input type="text" id="brukernavn" name="brukernavn" required><br/>
        Fornavn <input type="text" id="fornavn" name="fornavn" required><br/>
        Etternavn <input type="text" id="etternavn" name="etternavn" required><br/>
        Klassekode <select name="klassekode" id="klassekode">
        <?php print("<option value=''>velg klasse </option>");
 include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
        <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp"/>
        <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br/>
    </form>


 
<?php  
  if (isset($_POST["registrerStudentKnapp"]))  
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
 
          $sqlSetning="SELECT * FROM Student WHERE brukernavn='$brukernavn';"; 
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 
          $antallRader=mysqli_num_rows($sqlResultat);  
 
          if ($antallRader!=0)  /* student er registrert fra før */ 
            { 
              print ("Student er registrert fra f&oslashr"); 
            } 
          else 
            { 
              $sqlSetning="INSERT INTO Student (brukernavn,fornavn, etternavn, klassekode) 
                VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');"; 
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen"); 
                /* SQL-setning sendt til database-serveren */ 
 
              print ("F&oslash;lgende student er n&aring; registrert: $brukernavn $fornavn $etternavn $klassekode"); 
            } 
        } 
    } 
    
?> 

</div>

<div class="footer">
  <p>Alan Kamil Czubak</p>
  </div>

  </div>
</body>
</html>