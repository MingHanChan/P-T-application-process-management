<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
echo "請先登入";
header("Refresh: 1;url=userlogin.php");
exit;
}
?>

<html>
	<head>
	<meta charset="UTF-8">
	</head>
	<body>
	
	<form name="new_member" method="post" action="add_applyer.php">
	<caption>申請人資料</caption>
	<table border=0 cellspacing = 10>
	<td>姓名(中): <input type = "text" name = "custom_name_ch"></td>
	<td>姓名(英): <input type = "text" name = "custom_name_eg"></td>
	<tr></tr>
	<td>ID: <input type = "text" name = "custom_id"></td>
	<tr></tr>
	<td>電話: <input type = "text" name = "custom_telephone"></td>
	<td>行動電話: <input type = "text" name = "custom_cellphone"></td>
	<tr></tr>
	<td>傳真: <input type = "text" name = "custom_fax"></td>
	<td>Email: <input type = "text" name = "custom_email"></td>
	<tr></tr>
	<td>地址(中): <input type = "text" name = "custom_address_ch"></td>
	<td>地址(英): <input type = "text" name = "custom_address_eg"></td>
	<tr></tr>
	<td>國籍: <input type = "text" name = "custom_country"></td>
	</table>
	<input type="submit" name="submit" value="確認">
	</form>
	</body>
</html>