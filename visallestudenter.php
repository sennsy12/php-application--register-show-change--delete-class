<!DOCTYPE html>
<head>
  <title>Hjem  Obligatorisk oppgave 1</title>
  <link rel="stylesheet"  type="text/css" href="style1.css" media="screen"/>

</head>

 
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
<?php 

  include("247053-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */ 
 
  $sqlSetning="SELECT * FROM Student ORDER BY klassekode;"; 
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 
    /* SQL-setning sendt til database-serveren */ 
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */ 
 
  print ("<h1>Registrerte studenter </h1>");   
  print ("<table border=1>");  
  print ("<tr><th align=left>brukernavn</th> <th align=left>fornavn</th> <th align=left>etternavn</th> <th align=left>klassekode</th></tr>");  
 
  for ($r=1;$r<=$antallRader;$r++) 
    { 
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */ 
      $brukernavn=$rad["brukernavn"]; 
      $fornavn=$rad["fornavn"]; 
      $etternavn=$rad["etternavn"];
      $klassekode=$rad["klassekode"];
 
      print ("<tr><td> $brukernavn </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klassekode </td></tr>");  
    } 
  print ("</table>");   
 
  
?> 

  </div>

<div class="footer">
  <p>Alan Kamil Czubak</p>
  </div>

  </div>
</body>
</html>