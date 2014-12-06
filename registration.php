<?php
session_start();
?>
<html>
<head>
	<title>Регистрация</title>
</head>
<body>
	<?php
	include "header.php";
	include "bd.php";
	?>
	<style>
.navbar-inverse {
background-color: rgba(18, 18, 18, 0.86);
border-color: #080808;
}
nav #login-content {
background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
background-image: -webkit-linear-gradient(top, rgba(39, 39, 39, 0.96), rgba(96, 96, 96, 0.5));
background-image: -moz-linear-gradient(top, #fff, #eee);
background-image: -ms-linear-gradient(top, #fff, #eee);
background-image: -o-linear-gradient(top, #fff, #eee);
background-image: linear-gradient(top, #fff, #eee);
-moz-box-shadow: 0 2px 2px -1px rgba(0,0,0,.9);
box-shadow: 0 1px 1px 0px rgba(0, 0, 0, 0.34);
-moz-border-radius: 3px 0 3px 3px;
border-radius: 3px 0 3px 3px;
}

.alert-danger {
top: 56px;
width: 100%;
position: absolute;
color: #a94442;
background-color: #f2dede;
border-color: #ebccd1;
}

	</style>
 <form action="" method="post" class="form-horizontal registr_form">

 
  </div>
  <h2>Форма Регистрации</h2>
  <div class="form-group">
    <label class="control-label col-xs-3" for="firstName">Логин:</label>
    <div class="col-xs-9">
      <input type="text" name="login" class="form-control regist" id="firstName" placeholder="Введите логин" value=<?php echo $_POST['login']?>>
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-xs-3" for="inputEmail">Email:</label>
    <div class="col-xs-9">
      <input type="email" name="email" class="form-control regist" id="inputEmail" placeholder="Email" value=<?php echo $_POST['email']?>>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
    <div class="col-xs-9">
      <input type="password" name="password" class="form-control regist" id="inputPassword" placeholder="Введите пароль">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="confirmPassword">Подтвердите пароль:</label>
    <div class="col-xs-9">
      <input type="password" name="repeat_password" class="form-control regist" id="confirmPassword" placeholder="Введите пароль ещё раз">
    </div>
  </div>
  
  <br />
  <div class="form-group">
    <div class="col-xs-offset-3 col-xs-9">
      <input type="submit" class="btn btn-primary" name="submit" value="Регистрация">
      <a class="btn btn-default" href="main.php" role="button">Назад</a>
    </div>
  </div>
</form>
<?php
$_SESSION['page']="reg";
if (isset($_POST['submit']))
{
    if (isset($_POST['login'])) 
    { 
    	$login = $_POST['login']; 
    	if ($login == '') 
    	{ 
    	unset($login);
    } 
    } 
    if (isset($_POST['email'])) 
    { 
    	$email = $_POST['email']; 
    	if ($email == '') 
    	{ 
    	unset($email);
    } 
    } 
   
    if (isset($_POST['password'])) 
    	{
    	 $password=$_POST['password']; 
    	 if ($password =='') { 
    	 	unset($password);
    	 }
    	  }
    	  if (isset($_POST['repeat_password'])) 
    	{
    	 $repeat_password=$_POST['repeat_password']; 
    	 if ($repeat_password =='') { 
    	 	unset($repeat_password);
    	 }
    	  }
if($password != $repeat_password){
	 exit ("<div class='alert alert-danger' role='alert'>Вы повторили неверный пароль!</div>");
}
  if (empty($login) or empty($password) or empty($email) or empty($repeat_password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("<div class='alert alert-danger' role='alert'>Вы ввели не всю информацию, вернитесь назад и заполните все поля!</div>");
    }
  
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
$repeat_password = stripslashes($repeat_password);
    $repeat_password = htmlspecialchars($repeat_password);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    $repeat_password = trim($repeat_password);
    $email = trim($email);
    $password=md5(md5($password)+"kovalyk_ischadie_ada");
    $result = mysql_query("SELECT id FROM users WHERE login='$login'");
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("<div class='alert alert-danger' role='alert'>Извините, введённый вами логин уже зарегистрирован. Введите другой логин.</div>");
    }
 // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO users (login,password,email,access_level) VALUES('$login','$password','$email',1)");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "<div class='alert alert-success' role='alert'>Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. </div>";
    }
 else {
    echo "<div class='alert alert-danger' role='alert'>Ошибка! Вы не зарегистрированы.</div>";
    }
}
    ?>

</body>
</html>
