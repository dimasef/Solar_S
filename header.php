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
  <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
</head>

<body>
  <script>
$(document).ready(function(){

$('#login-trigger').click(function(){
  $(this).next('#login-content').slideToggle();
  $(this).toggleClass('active');          
  
  if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
    else $(this).find('span').html('&#x25BC;')
  })
});

  </script>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="main.php">Solar System</a>
          <ul class="nav navbar-nav">
            <li class="active"><a href="main.php">Главная</a></li>
            <li><a href="#about">Новости</a></li>
            <li><a href="#contact">Энциклопедия</a></li>
               <li><a href="#gelery">Галерея</a></li>
           
          </ul>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <?php
          if (empty($_SESSION['log']))
            echo "
<nav>
  <ul>
    <li id='login'>
      <a id='login-trigger' class='btn btn-success href='#'>Войти<span class='size_icon'>&#x25BC;</span>
      </a>
      <div id='login-content'>
        <form class='navbar-form navbar-right' role='form' id='form1' name='form1' method='post' action='login.php'>
          <fieldset id='inputs'>
         <p class='nameform'>Форма авторизации</p>
            <input id='username' class='form-control first_top n' type='text' name='username' placeholder='User name' required>  

             
            <input id='password' class='form-control n' type='password' name='password' placeholder='Password' required>
        

          </fieldset>
          <fieldset id='actions'>
           <a href='registration.php' class='btn btn-primary'>Регистрация</a>
            <button type='submit' class='btn btn-success log_for' name='Login'>Войти</button>
            
          </fieldset>
        </form>
      </div>                     
    </li>
  </ul>
</nav>";
      
          else 
          {
            echo "<form class='navbar-form navbar-right'><span class='name_in_header'>Добро пожаловать, Вы $login </span><a href = 'logout.php' class='btn btn-success'>Выйти
            </a><a href = 'profile.php' class='btn btn-primary1 btn-primary'>Профиль</a></form>";
          }
          ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <?php
          if ($_SESSION['err']==1)
      {
       $_SESSION['err']=0;
       echo"<div class='alert alert-danger' role='alert'>Неправильный логин или пароль.</div>"; 
      }
    ?>
