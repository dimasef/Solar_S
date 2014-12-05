<?php
session_start();
?>
<html>
<head>
	<title>Ваш профиль</title>
</head>
<body>
	<?php
	$_SESSION['page']="profile";
	include "header.php";
	$conn = mysql_connect('localhost','solar','test_pass') 
    or die ("Ooops something went wrong! <br>".mysql_error());
    mysql_select_db('solar_system',$conn);
    $querry="SELECT login,password,email,image_path FROM users WHERE login = \"$_SESSION[log]\"";
    $res1 = mysql_query($querry);
    $row = mysql_fetch_array($res1);
    if (empty($row[image_path]))
    	$img="avatars\default_avatar.png";
    else $img=$row[image_path];
	 echo "<br><br><br><form  name =\"profile_form\" method=\"post\" action =\"profile_change.php\" enctype=\"multipart/form-data\">
	<div class=\"form-group\" style=\"float:left\">
	<img src=\"$img\" height=\"100\" width=\"90\" border=\"2\">
	</div>
	<div class=\"form-group\">
	 <label>Логин:</label>
		<input type=\"text\" name = \"username\" value = \"$row[login]\" required >
	</div>
	<div class=\"form-group\">
	<label>Email:</label>
		<input type=\"text\" name = \"email\" value = \"$row[email]\" required >
	</div>
	<div class=\"form-group\">
		<label>Пароль:</label>
		<input type=\"password\" name = \"password\" >
	</div>
		<div class=\"form-group\">
		<label>Аватар:</label>
		<input type=\"file\" name = \"imgupload\" >
	</div>
		<input type=\"submit\" value =\"Сохранить\" class=\"btn btn-success\"></form>";
		if ($_SESSION['changed']==true)
		{
		  echo"<div class='alert alert-success' role='alert'>Данные успешно обновлены.</div>";
		  $_SESSION['changed']=false;
		}
	?>
</body>
</html>