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
	
	<form name="new_case" method="post" action="addpeople.php">
	申請人數 :
		<select name = "people_number">
		<option value = 1>1
		<option value = 2>2
		<option value = 3>3
		<option value = 4>4
		<option value = 5>5
		</select>
	<input type="submit" name="submit" value="確定">
	</form>
	<br>
	
	</body>
</html>