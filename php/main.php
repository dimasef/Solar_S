<?php
session_start();
$login=$_SESSION['log'];
?>
<html>
<head>
	<title>Это ж главная страница</title>
</head>
<body>
	<h1>Это главная страница ёпта!</h1>
	<h2>О да я вижу ты <?php echo $login;?></h2>
<?php
if ($_SESSION['ac_lvl']==3)
echo "<h3>Это может видеть только админ</h3>";
?>
<a href ="logout.php">Logout</a><br>
</body>
</html>