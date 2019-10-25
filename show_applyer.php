<!DOCTYPE html>
<?php
require_once( "dbconnect.php" );

if ( !isset( $_POST[ "search" ] ) ) {
	echo "請填表格";
	header( 'Location:search_applyer.php' );
}
$choise = $_POST[ "search" ]; //要搜尋的姓名或身分證
if ( preg_match( "/^[A-Z]{1}[0-9]{9}$/i",$choise ) ) { //用身分證搜尋
	$sql = "SELECT * FROM `applyer` WHERE `custom_id` = \"{$choise}\"";
} else { //用姓名搜尋
	$sql = "SELECT * FROM `applyer` WHERE `custom_name_ch` = \"{$choise}\"";
}
$result = mysql_query($sql);
$row = mysql_fetch_array( $result );
if(!$row){
	echo "<script>window.location.href='search_err.php'</script>";
}
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
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="defaultNavbar1">
			<?php
			$applyer_id = $row[ 'custom_id' ];
			$case_query = "SELECT case_name, office_number FROM `cases` WHERE applyer_id = \"{$applyer_id}\" ORDER BY \"case_name\"";
			$case_result = mysql_query( $case_query );
			?>
			<table width="1000" border="1">
				<thead>
					<tr>
						<th>姓名</th>
						<th>身分證號</th>
						<th>電話</th>
						<th>手機</th>
						<th>E-mail</th>
						<th>地址</th>
						<th>案件</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<?php echo $row['custom_name_ch'];?>
						</td>
						<td>
							<?php echo $row['custom_id'] ;?>
						</td>
						<td>
							<?php echo $row['custom_telephone'] ;?>
						</td>
						<td>
							<?php echo  $row['custom_cellphone'];?>
						</td>
						<td>
							<?php echo  $row['custom_email'];?>
						</td>
						<td>
							<?php echo $row['custom_address_ch'] ;?>
						</td>
						<td>
							<table>
								<?php
								while ( $case = mysql_fetch_array( $case_result ) ) {
									$office_number = $case['office_number'];
									?>
								<tr>
									<?php echo "<a href=case_file.php?office_number={$office_number}>" .$case['case_name']."</a><br/>"; ?>
								</tr>
								<?php
								}
								?>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
			<br/>
		</div>
	</div>
</body>

</html>