<?php
	mysql_connect("localhost","manager","123") or die("Connection Failed");
	mysql_select_db("db");
	mysql_query("set names 'utf8'");
	session_start();
	
if (empty($_POST["account"]) || empty($_POST["password"])){
	echo "請重新登入";
	echo "<br>3秒後返回,或<a href=right.php>按此返回</a>";
	header("Refresh: 3;url=right.php");
	exit;
}
else{
	$account=$_POST["account"];
	$password=$_POST["password"];
	if (!preg_match('/^\w+$/', $password)){
		echo "不合法字元";
		echo "<br>3秒後返回,或<a href=right.php>按此返回</a>";
		header("Refresh: 3;url=right.php");
		exit;
	}
	else{
		$sql="SELECT * from user where name='$account' and password='$password'";
		$result=mysql_query($sql);
		$num=mysql_num_rows($result);
		if($num==0){
			echo"您的帳號或密碼錯誤";
			echo "<br>3秒後返回,或<a href=right.php>按此返回</a>";
			header("Refresh: 3;url=right.php");
			exit;
		}
		else{
			$_SESSION['user'] = $account;
			$_SESSION['pw'] = $password; 
			echo"登入成功";
		}
	}
}

	

?>