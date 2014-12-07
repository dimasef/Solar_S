<?php
session_start();
?>
<html>
<head>
  <title>Профиль</title>

</head>

<body>
  <style>
.navbar-inverse {
background-color: rgba(18, 18, 18, 0.91)!important;
border-color: #080808!important;
}
.form-control{
width: 200px !important;
}
@media (min-width: 768px){
.form-inline .form-group {
display: inline-block;
margin-bottom: 10px!important;
vertical-align: middle;
}
}
  </style>

  <?php
  $_SESSION['page']="profile";
  include "header.php";
  include "bd.php";
    $querry="SELECT login,password,email,image_path FROM users WHERE login = \"$_SESSION[log]\"";
    $res1 = mysql_query($querry);
    $row = mysql_fetch_array($res1);
    if (empty($row[image_path]))
      $img="avatars\default_avatar.png";
    else $img=$row[image_path];
   echo "<div class='container pad_top'>
    <h2>Добро пожаловать в Ваш личный кабинет</h2>
    <br>
   <form  name =\"profile_form\" method=\"post\" action =\"profile_change.php\" enctype=\"multipart/form-data\">

  <div class=\"form-group\" style=\"float:left\">
  <img src=\"$img\" height=\"300\" width=\"200\" border=\"2\">
   <div class=\"form-group img_pad_group\">
    <label>Загрузить аватар:</label>
    <input type=\"file\" name = \"imgupload\" >
  </div>
  <input type=\"submit\" value =\"Сохранить\" class=\"btn btn-success\">
  </div>

  <div class=\"form-group\">
   <label>Ваш Логин:  <span class='row_em_pas'>$row[login]</span></label><br>
    <div class=\"accordion-group\">
<div class=\"accordion-heading\">
<a class=\"accordion-toggle collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion2\" href=\"#collapseThree\">
Сменить текущий логин
</a>
</div>

<div id=\"collapseThree\" class=\"accordion-body collapse\" style=\"height: 0px;\">
<div class=\"accordion-inner\">
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"exampleInputPassword2\">Password</label>
    <input type=\"text\"  name = \"username\" class=\"form-control\" id=\"exampleInputPassword2\" placeholder=\"Новый Логин\" value=\"$row[login]\">
  </div>
  <button type=\"submit\" class=\"btn btn-success\">Применить</button>
</div>
</div>
</div>
  </div>


  <div class=\"form-group\">
  <label>Ваш Email: <span class='row_em_pas'>$row[email]</span></label>
    <div class=\"accordion-group\">
<div class=\"accordion-heading\">
<a class=\"accordion-toggle collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion3\" href=\"#collapseThree1\">
Сменить текущий email
</a>
<br>
</div>

<div id=\"collapseThree1\" class=\"accordion-body collapse\" style=\"height: 0px;\">
<div class=\"accordion-inner\">
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"exampleInputPassword3\">Password</label>
    <input type=\"text\"  name = \"email\" class=\"form-control\" id=\"exampleInputPassword3\" placeholder=\"Новый Email\" value=\"$row[email]\">
  </div>
  <button type=\"submit\" class=\"btn btn-success\">Применить</button>
</div>
</div>
</div>
  </div>
  <div class=\"form-group\">";
  echo '
    <div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
Сменить пароль
</a>
</div>
<div id="collapseTwo" class="accordion-body collapse" style="height: 0px;">
<div class="accordion-inner">
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword2">Password</label>
    <input type="password" class="form-control" name="new_password" id="exampleInputPassword2" placeholder="Новый Пароль">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword2">New Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword2" placeholder=" Ёще Раз Новый Пароль">
    <button type="submit" class="btn btn-success" style="margin-top: 15px;">Сменить пароль</button>
  </div>
  
</div>
</div>
</div>
   
  </div>
  </form></div>';
    if ($_SESSION['changed']==1)
    {
      echo"<div class='alert alert-success' role='alert'>Данные успешно обновлены.</div>";
      $_SESSION['changed']=0;
    }
    else if ($_SESSION['changed']==2)
    {
      echo"<div class='alert alert-danger' role='alert'>Введенные пароли не совпадают.</div>";
      $_SESSION['changed']=0;
    }

if($_SESSION['ac_lvl']==3){
  $sql = mysql_query("SELECT * FROM users ORDER BY id");

  if(isset($_GET['del'])) 
  {
    $del = (int) $_GET['del'];
    echo $del;
    $query = "DELETE FROM `solar_system`.`users` WHERE `users`.`id` = $del";
    mysql_query($query) or die($query . '<br />' . mysql_error());
} 

echo "<div class='container'> <div class=\"accordion-group\">
<div class=\"accordion-heading\">
<a class=\"accordion-toggle collapsed\" data-toggle=\"collapse\" data-parent=\"#accordion5\" href=\"#coll\">
<h3>Управлять базой пользователей</h3>
</a>
</div>
<div id=\"coll\" class=\"accordion-body collapse\" style=\"height: 0px;\">
<div class=\"accordion-inner\">";

echo ("<table class='table table-striped' border ='1' style='text-align: center;'>");
  echo "<tr>
  <td>id</td>
  <td>Пользователь</td>
  <td>Пароль</td>
  <td>E-mail</td>
  <td>Статус</td>
  <td>Аватар</td>
  <td>Удаление пользователей</td>
         </tr>";


  while ($tablerows = mysql_fetch_row($sql))
  {

  echo"<tr>
  <form method='post' action=''>
    <td>{$tablerows[0]}</td>
    <td>$tablerows[1]</td>
    <td>$tablerows[2]</td>
    <td>$tablerows[3]</td>
    <td>$tablerows[4]</td>
    <td>$tablerows[5]</td>
        <td><a name=\"del\" href=\"profile.php?del=".$tablerows[0]."\"> <button type='button' class='btn btn-danger'>Удалить</button></a></td>
       </tr> ";
}
  echo "</table>
   </form>";

echo "</div>
</div>
</div>
</div>";


}


  ?>
</body>
</html>
