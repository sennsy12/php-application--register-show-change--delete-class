<?php   /*  dynamiske funksjoner */

function listeboksKlassekode()
{

  include("247053-tilkobling.php");
  $sqlSetning="SELECT * FROM Klasse ORDER BY klassekode;";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente fra db");
  $antallRader=mysqli_num_rows($sqlResultat);

  for ($r=1;$r<=$antallRader;$r++)
    {
       $rad=mysqli_fetch_array($sqlResultat);
       $klassekode=$rad ["klassekode"];
       $klassenavn=$rad ["klassenavn"];
       print("<option value='$klassekode'>$klassekode $klassenavn</option>");
    }
}


function listeboksStudent ()
{
 include("247053-tilkobling.php"); /* tilkobling til database-server og valg av database utført */

 $sqlSetning="SELECT * FROM Student ORDER BY brukernavn;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
 $brukernavn=$rad["brukernavn"];
 $fornavn=$_POST["fornavn"]; 
 $etternavn=$_POST ["etternavn"];
 $klassekode=$_POST["klassekode"]; 
 print("<option value='$brukernavn'>$brukernavn $fornavn $etternavn $klassekode</option>");
 /* ny verdi i listeboksen laget */
 }
}
?>

