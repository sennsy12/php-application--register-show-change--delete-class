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
    <h1>Endre klasse</h1>
 
    <div class="inputData"> 
 
    <form method="post" action="" id="endreKlasseSkjema" name="endreKlasseSkjema">
    Klasse 
    <select name="klassekode" id="klassekode">
    <?php print("<option value=''>velg klasse </option>");
 include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
       </select><br/>
    <input type="submit" value="finn klasse" name="finnKlasseKnapp" id="finnKlasseKnapp">
</form>

</div>
 
<?php 

if (isset($_POST ["finnKlasseKnapp"]))  
{ 
  include("247053-tilkobling.php");  /* tilkobling til database-server og valg av database utført */ 
  $klassekode=$_POST ["klassekode"];  

  $sqlSetning="SELECT * FROM Klasse WHERE klassekode ='$klassekode';"; 
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 

  $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */ 
  $klassekode=$rad["klassekode"]; 
  $klassenavn=$rad["klassenavn"]; 
  $studiumkode=$rad["studiumkode"]; 

  print("<br />"); 
  print ("<form method='post' action='' id='endreKlasseSkjema' name='endreKlasseSkjema'>"); 
  print ("klassekode <input type='text' value='$klassekode' name='klassekode' id='klassekode'  
      readonly /> <br />"); 
  print ("klassenavn <input type='text' value='$klassenavn' name='klassenavn' id='klassenavn'  
      required /> <br />"); 
  print ("Studiumkode <input type='text' value='$studiumkode' name='studiumkode' id='studiumkode'  
     required /> <br />"); 
  print ("<input type='submit' value='endre klasse' name='endreKlasseKnapp' id='endreKlasseKnapp'>"); 
  print ("</form>"); 
} 

  if (isset($_POST ["endreKlasseKnapp"]))  
    { 
      $klassekode=$_POST ["klassekode"]; 
      $klassenavn=$_POST ["klassenavn"]; 
      $studiumkode=$_POST ["studiumkode"];
  
      if (!$klassekode || !$klassenavn || !$studiumkode) 
        { 
          print ("Alle felt m&aring; fylles ut");  
 
        } 
      else 
        { 
          include("247053-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */ 
 
          $sqlSetning="UPDATE Klasse SET klassenavn='$klassenavn',studiumkode='$studiumkode' WHERE klassekode='$klassekode';";
          mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen");  
            /* SQL-setning sendt til database-serveren */ 
 
          print ("Klasse med klassekode $klassekode er n&aring; endret<br />"); 
        } 
    } 
    
?> 

<div class="footer">
  <p>Alan Kamil Czubak</p>
  </div>

  </div>
</body>
</html>