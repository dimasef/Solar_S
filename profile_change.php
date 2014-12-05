<?php
		session_start();
		$conn = mysql_connect('localhost','solar','test_pass') 
        or die ("Ooops something went wrong! <br>".mysql_error());
        mysql_select_db('solar_system',$conn);
        $querry="SELECT login,password,email FROM users WHERE login = \"$_SESSION[log]\"";
        $res1 = mysql_query($querry);
        $row = mysql_fetch_array($res1);
		if (!empty($_POST['username']))
		 {
		 	$part1;
		 	$part2;
		 	$part3;
		 	$the_first=true;
		 	$log_change=false;
		 	if ($row[login]!=$_POST['username'])
		 	{
		 		$part1="login='$_POST[username]'";
		 		$the_first=false;
		 		$log_change=true;
		 	}
		 	 if ($row[email]!=$_POST['email'])
		 	{
		 		if ($the_first)
		 		  {
		 			$part2="email='$_POST[email]'";
		 			$the_first=false;
		 		  }
		 		else 
		 			$part2=",email='$_POST[email]'";
		 	}
		 	 if ($row[password]!=$_POST['password'])
		 	{
		 		$pass=md5(md5($_POST[password])+"kovalyk_ischadie_ada");
		 		if ($the_first)
		 			$part3="password='$pass'";
		 		else $part3=",password='$pass'";
		 	}
		 	$all_in_one=$part1.$part2.$part3;
		 	$querry="UPDATE users SET $all_in_one WHERE login=\"$_SESSION[log]\"";
		 	mysql_query($querry);
		 	if (log_change)
		 		$_SESSION['log']=$_POST['username'];
		 	$_SESSION['changed']=true;
		 	header("Location: profile.php");
		 }
		 ?>