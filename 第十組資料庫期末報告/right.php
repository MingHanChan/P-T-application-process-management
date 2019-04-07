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
		<h3>歡迎光臨</h3>
			
			
	</head>
</html>
