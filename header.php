<?php
session_start();
$login=$_SESSION['log'];
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Solar System</title>
  <link href="css/solar_system.css" rel="stylesheet" type="tex/css">
  <link href="css/styles.css" rel="stylesheet" type="tex/css">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="main.php">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php
          if (empty($_SESSION['log']))
         echo " <form class='navbar-form navbar-right' role=\"form\" id=\"form1\" name=\"form1\" method=\"post\" action=\"login.php\">
            <div class=\"form-group\">
              <input type=\"text\" name=\"username\" placeholder=\"User name\" class=\"form-control\" required>
            </div>
            <div class=\"form-group\">
              <input type=\"password\" placeholder=\"Password\" name=\"password\" class=\"form-control\"required>
            </div>
            <button type='submit' class='btn btn-success' name='Login'>Войти</button>
            <a href = 'registration.php' class='btn btn-success btn_registr'>Регистрация</a>
          </form>";
          else 
          {
            echo "<form class='navbar-form navbar-right'><span class='name_in_header'>Добро пожаловать, Вы $login </span><a href = 'logout.php' class='btn btn-success'>Выйти
            </a><a href = 'profile.php' class='btn btn-success'>Профиль</a></form>";
          }
          ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <?php
          if ($_SESSION['err']==1)
      {
       $_SESSION['err']=0;
       echo"<div class='nah'><div class='alert alert-danger' role='alert'>Неправильный логин или пароль.</div></div>"; 
      }
    ?>


