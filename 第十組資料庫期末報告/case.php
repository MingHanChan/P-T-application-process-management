<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
echo "請先登入";
header("Refresh: 1;url=userlogin.php");
exit;
}
	$_SESSION["people"] = $_POST["good"];
?>
<html>
	<head>
	<meta charset="UTF-8">
	</head>
	<body>
	
	<form name="new_case" method="post" action="addcase.php">
	<caption>案件資料</caption>
	<table border=0 cellspacing = 10>
	<td>本所編號: <input type = "text" name = "case_name_number"></td>
	<td>狀態: <input type = "text" name = "case_status"></td>
	<tr></tr>
	<td>案件名稱: <input type = "text" name = "case_name"></td>
	<tr></tr>
	<!--<td>發文日期: <input type = "text" name = "document_date"></td>-->
	<td>申請案號: <input type = "text" name = "case_id"></td>
	<tr></tr>
	<td>國家: <input type = "text" name = "case_country"></td>
	<td>類別: <input type = "text" name = "case_category"></td>
	<!--<tr></tr>
	<td>結案日期: <input type = "text" name = "turn_down_date"></td>
	<td>結案原因: <input type = "text" name = "turn_down_reason"></td>-->
	</table>
	<input type="submit" name="submit" value="新增">
	</form>
	<br>
	
	</body>
</html>