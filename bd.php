<?php
$conn = mysql_connect('localhost','solar','test_pass') 
or die ("Ooops something went wrong! <br>".mysql_error());
mysql_select_db('solar_system',$conn); 
?>
