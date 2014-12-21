<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
$username = $_POST['login'];
$article = $_POST['title'];
$comment = $_POST['comm'];
$mysqli = new Mysqli('localhost', 'root', 'qwaser', 'solar_system')
or die ("Ooops something went wrong! <br>".mysql_error());
$mysqli->query("SET NAMES utf8");
$mysqli->query("insert into comments (user_id,article_id,comment) values
((select id from users where login=\"$username\"),(select id from articles where title=\"$article\"),\"$comment\")");
?>