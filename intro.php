<?php
session_start();

//Skapar anslutning till databasen. Kräver att det finns en användare som heter test med lösen pwd
$conn = new mysqli("localhost", "test1", "pwd", "mindb")
  or die("Kunde inte ansluta");

//Bygger upp sessionsvariablerna för att framme.php skall kunna använda den personliga cssen
$namn = "'".$_POST['namn']."'";
$losen = $_POST['losen'];
$logsql = "select * from anvandare where namn = $namn";
$result = $conn->query($logsql);
while($rad = $result->fetch_row()){
  if($rad[1] == $losen){
    $_SESSION['stil'] = "stilar/".$_POST['namn'].".css";
	$_SESSION['namn'] = $_POST['namn'];
	$conn->close();
    header("location:framme.php");
  }
}

//Detta händer bara om man försökt logga in med felaktiga uppgifter
echo "Endast för medlemmar";
$conn->close();
?>
