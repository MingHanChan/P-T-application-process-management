<?php
include( "dbconnect.php" );
session_start();
if ( !isset( $_SESSION[ 'user' ] ) || $_SESSION[ 'user' ] == "" ) {
	echo "<script>alert(\"您尚未登入,請先登入\")</script>";
	header( "Refresh: 0;url=index.php" );
	exit;
}
$case_name_number = $_POST[ "case_name_number" ];
$case_status = $_POST[ "case_status" ];
$case_name = $_POST[ "case_name" ];
//$document_date = $_POST["document_date"];
$case_id = $_POST[ "case_id" ];
$case_country = $_POST[ "case_country" ];
$case_category = $_POST[ "case_category" ];
$custom_name_ch = $_POST["custom_name_ch"];
$custom_id = $_POST["custom_id"];
//$turn_down_date = $_POST["turn_down_date"];
//$turn_down_reason = $_POST["turn_down_reason"];

$sql = "INSERT `cases` (`office_number`, `case_status`, `case_name`,  `case_id`, `country`,`case_category`,`applyer_id`)" .
"VALUES('$case_name_number','$case_status','$case_name','$case_id','$case_country','$case_category',`$custom_id`)";
$result = mysql_query( $sql );
//$sql = "INSERT `apply` (`case_name_number`) VALUES ('$case_name_number')";
	if($result)
		echo "<script>alert(\"新增完成\")</script>";
	else{
		echo "<script>alert(\"輸入錯誤，請重新輸入\")</script>";
		header("Refresh: 0 ;url = add_case.html");
	}
?>