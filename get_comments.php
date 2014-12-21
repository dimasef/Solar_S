<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
$count = $_POST['count'];
$article = $_POST['title_n'];
$mysqli = new Mysqli('localhost', 'root', 'qwaser', 'solar_system')
or die ("Ooops something went wrong! <br>".mysql_error());
$mysqli->query("SET NAMES utf8");
$r = array();
$result = $mysqli->query("select comments.id as id ,users.login as name,comments.comment as comment,comments.date as date,users.image_path as img
from comments inner join users on comments.user_id=users.id inner join articles on comments.article_id = articles.id
where comments.id >$count and articles.title = \"$article\" order by comments.date");
while($row = $result->fetch_assoc()) 
{
 $r[] = $row;
}
if(empty($r)) 
{
	echo "empty";
} else 
{
 echo json_encode($r);
}
?>