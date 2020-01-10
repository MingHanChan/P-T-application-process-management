<?php
session_start();
if ( !isset( $_SESSION[ 'user' ] ) || $_SESSION[ 'user' ] == "" ) {
	echo "請先登入";
	header( "Refresh: 1;url=userlogin.php" );
	exit;
}
?>


<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>案件狀態</title>
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
					<li><a href="#">登出</a>
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
			require_once( "dbconnect.php" );
			$office_number = $_REQUEST[ 'office_number' ];
			$query = "SELECT * FROM `cases` WHERE office_number = \"{$office_number}\"";
			$result = mysql_query( $query );
			if ( !$result ) {
				die( "<p>申請人列表錯誤" . mysql_error() );
			} else {
				$row = mysql_fetch_array( $result );
			}
			?>
			<!--案件基本資料-->
			<table class="table table-bordered">
				<caption>案件基本資料</caption>
				<thead>
					<tr>
						<th>本所編號</th>
						<th>案件名稱</th>
						<th>案號</th>
						<th>國家</th>
						<th>類別</th>
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
					</tr>
				</tbody>
			</table>
			<br/>
		</div>
		<div class="collapse navbar-collapse" id="defaultNavbar1">
			<table  class="table table-bordered">
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