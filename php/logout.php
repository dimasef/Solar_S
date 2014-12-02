<?php
session_start();
if (isset($_SESSION['log']))
{
	unset($_SESSION['log']);
	unset($_SESSION['ac_lvl']);
	header("Location: ..\main.php");
}
else 
	echo "You are not logged in";
?>