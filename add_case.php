<!DOCTYPE html>
<?php
session_start();
if ( !isset( $_SESSION[ 'user' ] ) || $_SESSION[ 'user' ] == "" ) {
	echo "請先登入";
	header( "Refresh: 1;url=userlogin.php" );
	exit;
}
$_SESSION[ "people" ] = $_POST[ "good" ];
?>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>新增案件</title>
	<!-- Bootstrap -->
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
							<li><a href="search_applyer.php">查詢</a>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">案件資料<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="cases_list.php">全部</a>
							</li>
							<li role="separator" class="divider"></li>
							<li><a href="search_case.php">查詢</a>
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
	<form name="new_case" method="post" action="addcase.php">
			<div class="form-group form-row">
				<label>本所編號:</label>
				<input type="text" name="case_name_number">
				<label>狀態:</label> 
				<input type="text" name="case_status">
			</td>
		
			</div>

			<tr></tr>
			<td>案件名稱: <input type="text" name="case_name">
			</td>
			<tr></tr>
			<!--<td>發文日期: <input type = "text" name = "document_date"></td>-->
			<td>申請案號: <input type="text" name="case_id">
			</td>
			<tr></tr>
			<td>國家: <input type="text" name="case_country">
			</td>
			<td>類別: <input type="text" name="case_category">
			</td>
			<!--<tr></tr>
	<td>結案日期: <input type = "text" name = "turn_down_date"></td>
	<td>結案原因: <input type = "text" name = "turn_down_reason"></td>-->
		
		<input type="submit" name="submit" value="新增">
	</form>
	<br>

</body>

</html>