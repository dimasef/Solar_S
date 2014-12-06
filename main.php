<?php
session_start();
?>
<html>
<head>
	<title>Главная</title>
</head>
<body>
	<style>
.alert-danger {
opacity: 0.7;
top: 56px;
width: 100%;
position: absolute;
color: #a94442;
background-color: #f2dede;
border-color: #ebccd1;
}
	</style>
	<?php
	unset($_SESSION['page']);
	include "header.php";
	?>

	<div class='main_backg'></div>
</body>
</html>
