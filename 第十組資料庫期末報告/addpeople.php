<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
echo "請先登入";
header("Refresh: 1;url=userlogin.php");
exit;
}
$people_number = $_REQUEST["people_number"];

	echo "<table border = '1'>";
	echo "<form name = 'people' method='post' action='case.php'>";
for($i=0 ; $i < $people_number ; $i++){
	echo "<td>"."申請人ID"."<input type = text name = good[]>"."</td>";
	echo "<tr></tr>";
}
echo "<input type='submit' name='submit' value='確定'>";
echo "</form>";

?>