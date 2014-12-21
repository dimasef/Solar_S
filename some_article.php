<?php
session_start(); 
?>
<html>
<head>
	<title>Some article!</title>
	<style type="text/css">
	.comments {
  border: 1px solid green;
  width: 300px;
  text-align: center;
  border-radius: 5px;
  margin: 0 auto 10px;
              }
.comments span {
  font-family: Tahoma;
               }
	</style>
</head>
<body onload="getComments();">
	<?php
	include "header.php";
	//include "footer.php";
	?>
    <br><br><br>
	<div id="title">Титулка статьи!</div>
  Блаблабла статья .....
  <?php
  include "comments.php";
  ?>
</form>
</body>
</html>