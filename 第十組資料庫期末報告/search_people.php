<!DOCTYPE html>
<?php
include("dbconnect.php");
if(isset($_POST["choise"])){
$choise = $_POST["choise"];
	$sql = "SELECT * FROM `applyer` WHERE `custom_name_ch` = '$choise'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
		if($row){
			echo "<table border = '1'>";
			for($i=0 ; $i < mysql_num_fields($result) ; $i++){
				echo "<td>".mysql_fetch_field($result,$i)->name."</td>";
			}
			echo "<tr></tr>";
			
				//echo "<tr>";
				for($j=0; $j < mysql_num_fields($result) ; $j++){
					echo "<td>$row[$j]</td>";
				}
				
				//echo "<tr/>";
		}
		else{
			echo "找不到姓名";
			
		}
}
else{
echo "請填表格";
}

?>
<html>
	<head>
	<meta charset="UTF-8">
	</head>
	<body>
	
	<form name="search" method="post" action="search_people.php">
	<table border=0 cellspacing = 10>
	<td>請輸入搜尋姓名<input type = "text" name = "choise"></td>
	</table>
	<input type="submit" name="submit" value="確認">
	</form>
	</body>
</html>