<?php
session_start();
if (isset($_SESSION['log']))
{
	unset($_SESSION['log']);
	unset($_SESSION['ac_lvl']);
	header("Location: ..\login.html");
}
else 
	echo "You are not logged in";
?>