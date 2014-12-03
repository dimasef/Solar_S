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
	?>
 <form action="registration.php" method="post" class="form-horizontal registr_form">

 
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="firstName">Логин:</label>
    <div class="col-xs-9">
      <input type="text" name="login" class="form-control regist" id="firstName" placeholder="Введите логин">
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-xs-3" for="inputEmail">Email:</label>
    <div class="col-xs-9">
      <input type="email" name="email" class="form-control regist" id="inputEmail" placeholder="Email">
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
    </div>
  </div>
</form>
<?php
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
	 exit ("Вы повторили неверный пароль!");
}

   
 if (empty($login) or empty($password) or empty($repeat_password) or empty($email)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
  
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
 
$conn = mysql_connect('localhost','root','root') 
or die ("Ooops something went wrong! <br>".mysql_error());
mysql_select_db('solar_system',$conn); 

    $result = mysql_query("SELECT id FROM users WHERE login='$login'");
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO users (login,password,email,access_level) VALUES('$login','$password','$email',1)");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. ";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>

</body>
</html>
