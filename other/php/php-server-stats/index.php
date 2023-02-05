<?php
/* 
If the host OS is Windows, open 'php.ini' & add:

---

[PHP_COM_DOTNET]
extension=php_com_dotnet.dll

---

Otherwise this script will NOT work.

*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $_SERVER['SERVER_NAME']; ?> - Server Stats</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
	<div id="container">
	<center>
	<?php require_once('includes/show-stats.php'); ?>
	</center>
	</div>
<footer>
	<div class="footer">
		<a href="https://brianoost.com/">Copyright © Brian Oost <?php echo date("Y"); ?>. All rights reserved.</a>
	</div>
</footer>
</body>
</html>