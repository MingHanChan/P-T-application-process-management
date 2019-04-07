<?php
	include("dbconnect.php");
	session_start();
	$case_name_number = $_POST["case_name_number"];
	$case_status= $_POST["case_status"];
	$case_name = $_POST["case_name"];
	//$document_date = $_POST["document_date"];
	$case_id = $_POST["case_id"];
	$case_country = $_POST["case_country"];
	$case_category = $_POST["case_category"];
	$people = $_SESSION['people'];
	//$turn_down_date = $_POST["turn_down_date"];
	//$turn_down_reason = $_POST["turn_down_reason"];
	
	$sql = 	"INSERT `case` (`case_name_number`, `case_status`, `case_name`,  `case_id`, `case_country`,`case_category`)". 
			"VALUES('$case_name_number','$case_status','$case_name','$case_id','$case_country','$case_category')";
	mysql_query($sql);
	//$sql = "INSERT `apply` (`case_name_number`) VALUES ('$case_name_number')";
	for($i = 0 ; $i < count($people); $i++){
		$sql = "INSERT `apply` (`case_id`,`custom_id`) VALUES ('$case_id','$people[$i]')";
		mysql_query($sql);
	}
	//if($result)
		echo "新增完成";
	//else
	//	echo "請重新輸入";
	//	header("Refresh: 1 ;url = case.php");

?>