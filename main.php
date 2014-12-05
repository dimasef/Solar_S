<?php
session_start();
?>
<html>
<head>
	<title>А вот это уже главная</title>
</head>
<body>
	<?php
	unset($_SESSION['page']);
	include "header.php";
	?>
</body>
</html>