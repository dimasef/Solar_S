<?php
session_start();
if (isset($_SESSION['log']))
{
	unset($_SESSION['log']);
	unset($_SESSION['ac_lvl']);
	if ($_SESSION['page']=="profile")
	{
		unset($_SESSION['page']);
	header("Location: main.php");
    }
    else 
	echo "<script>history.go(-1);</script>";
}
else 
	echo "You are not logged in";
?>