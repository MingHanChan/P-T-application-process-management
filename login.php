<?php
require_once( "dbconnect.php" );
mysql_select_db( "db" );
mysql_query( "set names 'utf8'" );
session_start();

if ( empty( $_POST[ "account" ] ) || empty( $_POST[ "password" ] ) ) {
	/*echo "帳號密碼錯誤,請重新登入";
	echo "<br>3秒後返回,或<a href=index.php>按此返回</a>";
	header("Refresh: 3;url=index.php");
	exit;*/
	echo "<script>alert(\"登入失敗,請重新登入\")</script>";

} else {
	$account = $_POST[ "account" ];
	$password = $_POST[ "password" ];
	$sql = "SELECT * from user where name='$account' and password='$password'";
	$result = mysql_query( $sql );
	$num = mysql_num_rows( $result );
	if ( $num == 0 ) {
		echo "<script>alert(\"登入失敗,請重新登入\")</script>";
	} else {
		$_SESSION[ 'user' ] = $account;
		$_SESSION[ 'pw' ] = $password;
		header( "Refresh: 1;url=begin.php" );
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>登入系統</title>
	<link href="css/bootstrap.css" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-default">
		<div>
			<h1>文理國際智慧財產權事務所</h1>
		</div>
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">

			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->

	</nav>
	<form name="log_in" method="post" action="login.php">
		<center>
			<font color=indigo><b>帳號: </b>
			</font><input type="text" name="account">
			<center><br>
				<center>
					<font color=indigo><b>密碼: </b>
					</font><input type="password" name="password">
					<center><br>
						<input type="submit" name="submit" value="登入"/>
	</form>

</body>

</html>