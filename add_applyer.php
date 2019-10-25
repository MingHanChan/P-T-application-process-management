<?php
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
	
	
	$sql = 	"INSERT applyer (custom_name_ch, custom_name_eg, custom_id, custom_telephone, custom_cellphone, custom_fax, custom_email, custom_address_ch, custom_address_eg, custom_country)". 
			"VALUES('$custom_name_ch','$custom_name_eg','$custom_id','$custom_telephone','$custom_cellphone','$custom_fax','$custom_email','$custom_address_ch','$custom_address_eg','$custom_country')";
	$result = mysql_query($sql);
	if($result)
		echo "新增完成";
	else{
		echo "請重新輸入";
		header("Refresh: 1 ;url = member.php");
	}
	
?>