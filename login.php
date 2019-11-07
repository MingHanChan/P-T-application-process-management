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
	header( "Refresh: 0;url=index.html" );

} else {
	$account = $_POST[ "account" ];
	$password = $_POST[ "password" ];
	$sql = "SELECT * from user where name='$account' and password='$password'";
	$result = mysql_query( $sql );
	$num = mysql_num_rows( $result );
	if ( $num == 0 ) {
		echo "<script>alert(\"登入失敗,請重新登入\")</script>";
		header( "Refresh: 0;url=index.html" );
	} else {
		$_SESSION[ 'user' ] = $account;
		$_SESSION[ 'pw' ] = $password;
		header( "Refresh: 0;url=begin.php" );
	}
}
?>
