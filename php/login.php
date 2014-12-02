<?php
session_start();
$username = $_POST[username];
$password = $_POST[password];
$conn = mysql_connect('localhost','solar','test_pass') 
or die ("Ooops something went wrong! <br>".mysql_error());
mysql_select_db('solar_system',$conn);
$querry = "SELECT login,password,access_level FROM users WHERE login=\"$username\"";
$res1 = mysql_query($querry);
$row = mysql_fetch_array($res1);
if ($res1=""||$row[password]!=$password)
 {
  //header("Refresh: 2;  url=..\main.php");
  //echo "Wrong Login/Password";
 	$_SESSION['err']=1;
 	header("Location: ..\main.php");
 }
 else 
 {
 	$_SESSION['log']=$username;
    $_SESSION['ac_lvl']=$row[access_level];
 	header("Location: ..\main.php");
 }
?>