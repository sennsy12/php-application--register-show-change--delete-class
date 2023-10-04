<?php  /* 247053-tilkobling */
/*
/* programmet foretar tilkobling til database-server og valg av database 
*/

$host="localhost";
$user="247053";
$password="ZwCAw0Fb";
$database="247053";
/* verdier satt for host, user, password og database for tilkobling til databaseserver */


$db=mysqli_connect ($host, $user, $password,$database) or die ("ikke kontakt med database-server")
/* tilkobling til database-serveren utført */


?>
