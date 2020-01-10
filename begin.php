<!DOCTYPE html>
<?php
session_start();
if ( !isset( $_SESSION[ 'user' ] ) || $_SESSION[ 'user' ] == "" ) {
	echo "<script>alert(\"您尚未登入,請先登入\")";
	header( "Refresh: 0;url=index.php" );
	exit;
} else {
	require_once( "dbconnect.php" );
	$query = "SELECT office_number ,case_name, applyer_id , case_category ,country, case_status FROM `cases` WHERE case_status!=\"核准\" OR \"核駁\" ORDER BY `office_number`";
	$result = mysql_query( $query );
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
?>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>首頁</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="https://www.w3schools.com/lib/w3.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
	<body>
	<?php require('header.php'); ?>
	<div w3-include-html="header.html"></div>
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
						<th>狀態</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for ( $i = 0; $i < 10; $i++ ) {
						if(!$row = mysql_fetch_array( $result ))
							continue;
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
							<?php echo "<a href=#>". $row['case_status'] . "</a>";?>
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
	<script src="file:///C|/Users/USER/AppData/Roaming/Adobe/Dreamweaver CC 2018/zh_TW/Configuration/Temp/Assets/eam9FEF.tmp/js/jquery-1.11.3.min.js"></script>
	<script src="file:///C|/Users/USER/AppData/Roaming/Adobe/Dreamweaver CC 2018/zh_TW/Configuration/Temp/Assets/eam9FEF.tmp/js/bootstrap.js"></script>

</body>

</html>