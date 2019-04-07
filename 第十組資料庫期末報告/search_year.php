<?php
include("dbconnect.php");
$select = $_REQUEST["select"];
$sql = "select * from `case` Where DATE_FORMAT(money_date,'%m') = '$select' AND case_status != '結案'";
 $result = mysql_query($sql) or die('MySQL query error');
    while($row = mysql_fetch_array($result)){
        echo "案件名稱:",$row['case_name'],"案號:",$row['case_id'],"<br>";
    }
?>