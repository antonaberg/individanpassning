<?php
session_start();
?>
<html>
<head>
  <title><?php echo $_SESSION['namn'];?>s sida</title>
  <link rel="stylesheet" href="<?php echo $_SESSION['stil'];?>" type="text/css">
</head>
<body>
<form name="bytcss" method="post" action="bytcss.php">
<br>
	Min favoritfont:<br>
	  <input type="radio" name="font" value="Times New Roman" checked="checked"><font face="Times New Roman">Times New Roman</font><br>
      <input type="radio" name="font" value="Arial"><font face="Arial">Arial</font><br>
      <input type="radio" name="font" value="Calibri"><font face="Calibri">Calibri</font><br>
      <input type="radio" name="font" value="Baskerville Old Face"><font face="Baskerville Old Face">Baskerville Old Face</font><br>
	<br>
	Min älsklingsfärg:<br>
	  <input type="radio" name='farg' value='"apa.gif"' checked="checked">apa<br>
	  <input type="radio" name='farg' value='"apa.jpg"' checked="checked">apa2<br>
	  
	<br>

    <input type="submit" value="Skicka!">
  </form>




</body>
</html>
