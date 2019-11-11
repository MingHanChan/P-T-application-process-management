<?php
session_start();
if ( !isset( $_SESSION[ 'user' ] ) || $_SESSION[ 'user' ] == "" ) {
	echo "<script>alert(\"您尚未登入,請先登入\")";
	header( "Refresh: 0;url=index.php" );
	exit;
}else {
	require_once( "dbconnect.php" );
	$query = 
	$patent_query = "SELECT * FROM `cases` WHERE case_status = \"核准\" AND (case_category=\"發明專利\" OR case_category=\"新型專利\" OR case_category=\"新式樣專利\") ORDER BY `begin_date`";
	$result = mysql_query( $patent_query );
	if ( !$result ) {
		die( "<p>未完成案件總覽錯誤" . mysql_error() );
	}
	$data_nums = mysql_num_rows( $result ); //統計總比數
	$per = 20; //每頁的顯示幾筆申請人數量
	$pages = ceil( $data_nums / $per ); //取得不小於值的下一個整數,總共要幾頁
	if ( !isset( $_GET[ "page" ] ) ) { //假如$_GET["page"]未設置
		$page = 1; //則在此設定起始頁數
	} else {
		$page = intval( $_GET[ "page" ] ); //確認頁數只能夠是數值資料
	}
	$start = ( $page - 1 ) * $per; //每一頁開始的資料序號
	$result = mysql_query( $query . ' LIMIT ' . $start . ', ' . $per )or die( mysql_errno() );//20 data for each page 每次取得20筆資料 
}
require('header.php');
?>
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="defaultNavbar1">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>本所編號</th>
						<th>專利名稱</th>
						<th>申請人</th>
						<th>類別</th>
						<th>國家</th>
						<th>到期日期</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for ( $i = 0; $i < 10; $i++ ) {
						if(!$row = mysql_fetch_array( $result ))
							continue;
						if($row['case_category']=="商標"||$row['case_category']=="證明標章"||$row['case_category']=="團體標章"||$row['case_category']=="團體商標"){
							//商標
							$paid = $row['paid']+10;
							$que = 
							$res = mysql_query("SELECT ADDDATE('{$row['begin_date']}',INTERVAL $paid YEAR)");
							$end_date = mysql_fetch_array($res);//取得後十年到期日
							$res = mysql_query("SELECT SUBDATE('{$end_date[0]}',INTERVAL 6 MONTH)");
							$remind_date = mysql_fetch_array($res);//到期前六個月提醒日
							$now_date = date('c');
							$res = mysql_query("SELECT DATEDIFF('{$remind_date[0]}','{$now_date}')");
							$remind_day = mysql_fetch_array($res);
							if($remind_day[0]>0){
								continue;
							}
						}
						else{
							//專利 到期展延即可 每年繳
							$paid = $row['paid'];
							$res = mysql_query("SELECT ADDDATE('{$row['begin_date']}',INTERVAL $paid YEAR)");
							$end_date = mysql_fetch_array($res);//取得到期日
							$res = mysql_query("SELECT SUBDATE('{$end_date[0]}',INTERVAL 3 MONTH)");
							$remind_date = mysql_fetch_array($res);//到期前三個月提醒日
							$now_date = date('c');
							$res = mysql_query("SELECT DATEDIFF('{$remind_date[0]}','{$now_date}')");
							$remind_day = mysql_fetch_array($res);
							echo $remind_day[0];
							if($remind_day[0]>0){
								continue;
							}
						}
						$name_query = "SELECT custom_name_ch FROM `applyer` WHERE custom_id = \"{$row['applyer_id']}\"";
						$name = mysql_fetch_array(mysql_query($name_query));
					?>
					<tr>
						<td>
							<?php echo "<a href=#>". $row['office_number'] . "</a>";?>
						</td>
						<td>
							<?php echo "<a href=#>". $row['case_name'] . "</a>";?>
						</td>
						<td>
							<?php echo "<a href=#>". $name['custom_name_ch'] . "</a>";?>
						</td>
						<td>
							<?php echo "<a href=#>". $row['case_category'] . "</a>";?>
						</td>
						<td>
							<?php echo "<a href=#>". $row['country'] . "</a>";?>
						</td>
						<td>
							<?php echo "<a href=#>". $end_date[0] . "</a>";?>
						</td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<br/>

			<?php
			echo "<div class=\"text-right\"> 頁數 : ";
			for ( $i = 1; $i <= $pages; $i++ ) {
					if ( $i === $page ) {
						echo "<strong >" . $page . "</strong>  ";
					} else {
						echo "<a href=?page=" . $i . ">" . $i . "</a>  ";
					}
			}
			echo "</div>";
			?>

			<div class="col-md-12"></div>
		</div>
	</div>

</body>

</html>