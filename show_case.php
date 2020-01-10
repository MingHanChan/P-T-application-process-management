<!DOCTYPE html>
<?php
require_once( "dbconnect.php" );
if ( !isset( $_POST[ "search" ] ) ) {
	echo "請填表格";
	header( 'Location:search_applyer.php' );
}
$choise = $_POST[ "search" ]; //要搜尋的本所編號或案件名稱
if ( preg_match( "/^[A-Z]-[0-9]-[0-9]$/i", $choise ) ) { //用本所編號搜尋
	$sql = "SELECT * FROM `cases` WHERE `office_number` = \"{$choise}\"";
} else { //用案件名稱搜尋
	$sql = "SELECT * FROM `cases` WHERE `case_name` = \"{$choise}\"";
}
$result = mysql_query($sql);
$row = mysql_fetch_array( $result );
if(!$row){
	echo "<script>window.location.href='search_err.php'</script>";
}
$applyer_id = $row[ 'applyer_id' ];
$query = "SELECT custom_name_ch FROM `applyer` WHERE custom_id = \"{$applyer_id}\"";
$applyer = mysql_fetch_array( mysql_query( $query ) );
?>
<html>

<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.js"></script>
	<nav class="navbar navbar-default">
		<div>
			<h1>文理國際智慧財產權事務所</h1>
		</div>
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="begin.php">首頁</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="defaultNavbar1">
				<ul class="nav navbar-nav">
					<li class="active"></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">申請人資料<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="applyer_list.php">全部</a>
							</li>
							<li role="separator" class="divider"></li>
							<li><a href="applyer_search.php">查詢</a>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">案件資料<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="cases_list.php">全部</a>
							</li>
							<li role="separator" class="divider"></li>
							<li><a href="case_search.php">查詢</a>
							</li>
						</ul>
					</li>
					<li><a href="#">年費管理</a>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">新增<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">案件</a>
							</li>
							<li role="separator" class="divider"></li>
							<li><a href="#">申請人</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">登出</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->

	</nav>
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="defaultNavbar1">
			<?php
			$query = "SELECT * FROM `cases` WHERE office_number = \"{$row ['office_number']}\"";
			$result = mysql_query( $query );
			if ( !$result ) {
				die( "<p>申請人列表錯誤" . mysql_error() );
			} else {
				$row = mysql_fetch_array( $result );
			}
			?>
			<!--案件基本資料-->
			<table width="1000" border="1">
				<caption>案件基本資料</caption>
				<thead>
					<tr>
						<th>本所編號</th>
						<th>案件名稱</th>
						<th>案號</th>
						<th>國家</th>
						<th>類別</th>
						<th>申請人</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<?php echo $row['office_number']; ?>
						</td>
						<td>
							<?php echo $row['case_name'] ;?>
						</td>
						<td>
							<?php echo $row['case_id']?$row['case_id']:"尚未有案號";?>
						</td>
						<td>
							<?php echo $row['country'];?>
						</td>
						<td>
							<?php echo $row['case_category'];?>
						</td>
						<td>
							<?php echo $applyer['custom_name_ch'];?>
						</td>
					</tr>
				</tbody>
			</table>
			<br/>
		</div>
		<div class="collapse navbar-collapse" id="defaultNavbar1">
			<table width="1000" border="1">
				<caption>案件進度</caption>
				<thead>
					<tr>
						<th>撰稿完成日</th>
						<th>繪圖完成日</th>
						<th>送件日</th>
						<th>公告日</th>
						<th>結案日</th>
						<th>結案原因</th>
					</tr>
				</thead>
				<!--案件進度-->
				<tbody>
					<tr>
						<td>
							<?php echo $row['write_date']?$row['write_date']:"尚未完成"; ?>
						</td>
						<td>
							<?php echo $row['graph_date']?$row['graph_date']:"尚未完成" ;?>
						</td>
						<td>
							<?php echo $row['ship_date']?$row['ship_date']:"尚未完成";?>
						</td>
						<td>
							<?php echo $row['begin_date']?$row['begin_date']:"尚未完成";?>
						</td>
						<td>
							<?php echo $row['turn_down_date']?$row['turn_down_date']:"尚未結案";?>
						</td>
						<td>
							<?php echo $row['turn_down_reason']? $row['turn_down_reason']:"尚未結案";?>
						</td>
					</tr>
				</tbody>
			</table>
			<br/>
		</div>
	</div>
</body>

</html>