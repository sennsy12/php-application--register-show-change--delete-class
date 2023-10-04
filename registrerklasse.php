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

<?php

?>
<div class="innhold">
    <h1>Registrer klasse</h1>
 
    <div class="inputData"> 
    <form method="post" action="" id="registrerKlasseSkjema" name="registrerKlasseSkjema">
        Klassekode <input type="text" id="klassekode" name="klassekode" required><br/>
        Klassenavn <input type="text" id="klassenavn" name="klassenavn" required><br/>
        Studiumkode <input type="text" id="studiumkode" name="studiumkode" required><br/>
        <input type="submit" value="Registrer klasse" id="registrerKlasseKnapp" name="registrerKlasseKnapp"/>
        <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br/>
    </form>
    

</div>
 
<?php  
  if (isset($_POST ["registrerKlasseKnapp"]))  
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
 
          $sqlSetning="SELECT * FROM Klasse WHERE klassekode='$klassekode';"; 
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 
          $antallRader=mysqli_num_rows($sqlResultat);  
 
          if ($antallRader!=0)  /* klasse er registrert fra før */ 
            { 
              print ("Klasse er registrert fra f&oslashr"); 
            } 
          else 
            { 
              $sqlSetning="INSERT INTO Klasse (klassekode,klassenavn,studiumkode) 
                VALUES('$klassekode','$klassenavn','$studiumkode');"; 
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen"); 
                /* SQL-setning sendt til database-serveren */ 
 
              print ("F&oslash;lgende klasse er n&aring; registrert: $klassekode $klassenavn $studiumkode"); 
            } 
        } 
    } 
    
    ?>



<div class="footer">
  <p>Alan Kamil Czubak</p>
  </div>

  </div>
</body>
</html>