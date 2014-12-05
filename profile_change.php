<?php
		session_start();
		$conn = mysql_connect('localhost','solar','test_pass') 
        or die ("Ooops something went wrong! <br>".mysql_error());
        mysql_select_db('solar_system',$conn);
        $querry="SELECT login,password,email,image_path FROM users WHERE login = \"$_SESSION[log]\"";
        $res1 = mysql_query($querry);
        $row = mysql_fetch_array($res1);
		if (!empty($_POST['username']))
		 {
		 	$part1;
		 	$part2;
		 	$part3;
		 	$part4;
		 	$target;
		 	if (!empty($_FILES['imgupload']['name']))
		 	{
		 		if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['imgupload']['name'])&&$_FILES["imgupload"]["size"] > upload_max_filesize)
		 		{
      			    $filename = $_FILES['imgupload']['name'];
       				$source = $_FILES['imgupload']['tmp_name'];
        			$target = "avatars/"."_".$filename;
                    move_uploaded_file($source, $target);
		 		}
		 	}
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
		 		{
		 			$part3="password='$pass'";
		 			$the_first=false;
		 		}
		 		else $part3=",password='$pass'";
		 	}
		 	 if (!empty($_FILES['imgupload']['name']))
		 	{
		 		if ($the_first)
		 			$part4="image_path='$target'";
		 		else $part4=",image_path='$target'";
		 	}
		 	$all_in_one=$part1.$part2.$part3.$part4;
		 	$querry="UPDATE users SET $all_in_one WHERE login=\"$_SESSION[log]\"";
		 	mysql_query($querry);
		 	if (log_change)
		 		$_SESSION['log']=$_POST['username'];
		 	$_SESSION['changed']=true;
		 	header("Location: profile.php");
		 }
		 ?>