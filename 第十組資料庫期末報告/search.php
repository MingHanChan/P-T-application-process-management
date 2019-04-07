<!DOCTYPE html>
<?php
include("dbconnect.php");
if(isset($_POST["choise"])){
$select = $_REQUEST["select"];
$choise = $_POST["choise"];
	switch($select){//用申請案號搜尋
	case 'case_id':
	$sql = "SELECT * FROM `case` WHERE `case_id` = '$choise'";
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
			echo "找不到案號";
			
		}
		break;
	case 'custom_name' ://用申請人搜尋
		$sql = "SELECT `case_name_number`,`case_status`,`case_name`,`document_date`,`case`.case_id,`case_country`,`case_category`,`money_date`,`turn_down_date`,`turn_down_reason`,apply.`custom_id`,`money_year`".
				"FROM `apply`,`applyer`,`case`".
				"WHERE `custom_name_ch`='$choise' AND `applyer`.custom_id=`apply`.custom_id AND `apply`.case_id=`case`.case_id";
		$result = mysql_query($sql);
		
		if(mysql_num_rows($result)){
			echo "<table border = '1'>";
			for($i=0 ; $i < mysql_num_fields($result) ; $i++){
				echo "<td>".mysql_fetch_field($result,$i)->name."</td>";
			}
			echo "<tr></tr>";
			
				//echo "<tr>";
				
				while(($row = mysql_fetch_array($result))){
					for($j=0; $j < mysql_num_fields($result) ; $j++){
					echo "<td>$row[$j]</td>";
					}
					echo "<tr></tr>";
				}
				
				//echo "<tr/>";
		}
		else{
			echo "找不到姓名";
		}
		break;
		
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
	
	<form name="search" method="post" action="search.php">
	<table border=0 cellspacing = 10>
	<select name = "select">
		<option value = "case_id">申請案號
		<option value = "custom_name">申請人
	</select>
	<td>請輸入<input type = "text" name = "choise"></td>
	</table>
	<input type="submit" name="submit" value="確認">
	</form>
	</body>
</html>