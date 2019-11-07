<?php
session_start();
if ( !isset( $_SESSION[ 'user' ] ) || $_SESSION[ 'user' ] == "" ) {
	echo "<script>alert(\"您尚未登入,請先登入\")</script>";
	header( "Refresh: 0;url=index.php" );
	exit;
}
	include("dbconnect.php");

	$custom_name_ch = $_POST["custom_name_ch"];
	$custom_name_eg= $_POST["custom_name_eg"];
	$custom_id = $_POST["custom_id"];
	$custom_telephone = $_POST["custom_telephone"];
	$custom_cellphone = $_POST["custom_cellphone"];
	$custom_fax = $_POST["custom_fax"];
	$custom_email = $_POST["custom_email"];
	$custom_address_ch = $_POST["custom_address_ch"];
	$custom_address_eg = $_POST["custom_address_eg"];
	$custom_country = $_POST["custom_country"];
	
	
	$sql = 	"INSERT applyer (custom_name_ch, custom_name_eg, custom_id, custom_telephone, custom_cellphone, custom_fax, custom_email, custom_address_ch, custom_address_eg, custom_country)". "VALUES('$custom_name_ch','$custom_name_eg','$custom_id','$custom_telephone','$custom_cellphone','$custom_fax','$custom_email','$custom_address_ch','$custom_address_eg','$custom_country')";
	$result = mysql_query($sql);
	if($result)
		echo "<script>alert(\"新增完成\")</script>";
	else{
		echo "<script>alert(\"輸入錯誤，請重新輸入\")</script>";
		header("Refresh: 0 ;url = add_applyer.php");
	}
	
?>