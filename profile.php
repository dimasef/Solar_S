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
<form class=\"form-inline\" role=\"form\">
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"exampleInputPassword2\">Password</label>
    <input type=\"text\"  name = \"username\" class=\"form-control\" id=\"exampleInputPassword2\" placeholder=\"Новый Логин\">
  </div>
  <button type=\"submit\" class=\"btn btn-success\">Применить</button>
</form>
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
<form class=\"form-inline\" role=\"form\">
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"exampleInputPassword3\">Password</label>
    <input type=\"text\"  name = \"email\" class=\"form-control\" id=\"exampleInputPassword3\" placeholder=\"Новый Email\">
  </div>
  <button type=\"submit\" class=\"btn btn-success\">Применить</button>
</form>
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
<form class="form-inline" role="form">
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword2">Password</label>
    <input type="password" class="form-control" \"old_password\" id="exampleInputPassword2" placeholder="Текущий Пароль">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword2">New Password</label>
    <input type="password" class="form-control" \"password\" id="exampleInputPassword2" placeholder="Новый Пароль">
  </div>
  <button type="submit" class="btn btn-success">Сменить пароль</button>
</form>
</div>
</div>
</div>
   
  </div>
   
  </form></div>';
    if ($_SESSION['changed']==true)
    {
      echo"<div class='alert alert-success' role='alert'>Данные успешно обновлены.</div>";
      $_SESSION['changed']=false;
    }
  ?>
</body>
</html>
