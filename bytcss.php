<?php
session_start();
    $stilfil = "stilar/".$_SESSION['namn'].".css";
	$stil = "body {background:url(".$_POST['farg']."); font-family: ".$_POST['font'].";}";
	$f = @fopen($stilfil, "w");
	if(!$f) die ("Filfail");
	fwrite($f, $stil);
	fclose($f);
	header("location:framme.php");

?>
