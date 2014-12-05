<?php
session_start();
?>
<html>
<head>
	<title>Главная</title>
</head>
<body>
	<?php
	unset($_SESSION['page']);
	include "header.php";
	?>

	<div class='main_backg'></div>
</body>
</html>
