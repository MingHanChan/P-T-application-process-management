<!DOCTYPE html>
<?php
	include("dbconnect.php");
	
	if(isset($_POST["case_name_number"])){
	$case_name_number = $_POST["case_name_number"];
	$select = $_REQUEST["select"];
	$modify = $_POST["modify"];
	$sql = "SELECT `case_name_number` FROM `case` WHERE `case_name_number` = '$case_name_number'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
		if($row){
			echo $row["case_name_number"];
			$sql = "UPDATE `case` SET `$select` = '$modify'";
			$result = mysql_query($sql);
				if($result)
					echo "新增完整";
				else
					echo "錯誤";
		}
		else{
			echo "找不到案號";
	
		}
	}
	else{
	
	}
	
?>
<html>
	<head>
	<meta charset="UTF-8">
		<form name="modify" method="post" action="modify_case.php"> 
		輸入本所編號: <input type=text name="case_name_number"> 
		<br>
		修改項目 :
		<select name = "select">
		<option value = "document_date">發文日期
		<option value = "money_date">年費起日
		<option value = "money_year">已繳年次
		<option value = "case_status">案件狀態
		<option value = "turn_down_date">結案日期
		<option value = "turn_down_reason">結案原因
		<option value = "write_date">撰稿完成日
		<option value = "graph_date">繪圖完成日
		<option value = "status">校對狀態
		<option value = "modify_date">校對完成日
		<option value = "send_date">送件日期
		</select>
		內容:	<input type=text name="modify"> 
		<input type="submit" name="submit" value="新增">
		</form>
		
	</head>
</html>