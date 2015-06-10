<?php

//Skapar anslutning till databasen. Kräver att det finns en användare som heter test med lösen pwd
$conn = new mysqli("localhost", "test1", "pwd", "mindb")
  or die("Kunde inte ansluta");

//Kollar om användaren redan finns, kräver att tabellen anvandare finns i databasen mindb
$sql = "select * from anvandare";
$result = $conn->query("$sql");
$fanns = false;
while($rad = $result->fetch_row()){
  if($_POST['namn'] == $rad[0]){
    $fanns = true;
    break;
  }
}

//Om användaren redan finns får man försöka igen
if($fanns){
  $conn->close();
  header("location:nyanv.htm");
}

//Användaren skapas, och hens css sparas i nytt dokument med användarens namn
else{
  $insql = "insert into anvandare(namn, losen) values ('".$_POST['namn']."', '".$_POST['losen']."')";
  if($conn->query("$insql"))
  {
    echo "Du har nu ett konto ";
	$stilfil = "stilar/".$_POST['namn'].".css";
	$stil = "body {background:url(".$_POST['farg']."); font-family: ".$_POST['font'].";}";
	$f = @fopen($stilfil, "w");
	if(!$f) die ("Filfail");
	fwrite($f, $stil);
	fclose($f);
  }
  else
    "Det bidde fel!";
  $conn->close();
}
?>
