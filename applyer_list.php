<!DOCTYPE html>
<?php
session_start();
if ( !isset( $_SESSION[ 'user' ] ) || $_SESSION[ 'user' ] == "" ) {
	echo "請先登入";
	header( "Refresh: 1;url=userlogin.php" );
	exit;
}
?>

<html>

<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.css" rel="stylesheet">
	<title>申請人列表</title>
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
			require_once( "dbconnect.php" );
			$query = "SELECT custom_name_ch,custom_id, custom_telephone , custom_cellphone ,custom_email, custom_address_ch FROM `applyer` ORDER BY `custom_name_ch`";
			$result = mysql_query( $query );
			if ( !$result ) {
				die( "<p>申請人列表錯誤" . mysql_error() );
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
			$result = mysql_query( $query . ' LIMIT ' . $start . ', ' . $per )or die( mysql_errno() );
			?>
			<table class="table table-bordered table-hover">
				<thead class="thead-dark">
					<tr>
						<th>姓名</th>
						<th>身分證號</th>
						<th>電話</th>
						<th>手機</th>
						<th>E-mail</th>
						<th>地址</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for ( $i = 0; $i < 10; $i++ ) {
						if(!$row = mysql_fetch_array( $result ))
							continue;
					?>
					<tr>
						<td>
							<?php echo "<a href=applyer_cases.php?applyer_id={$row['custom_id']}>". $row['custom_name_ch'] . "</a>";?>
						</td>
						<td>
							<?php echo $row['custom_id'];?>
						</td>
						<td>
							<?php echo $row['custom_telephone'];?>
						</td>
						<td>
							<?php echo $row['custom_cellphone'];?>
						</td>
						<td>
							<?php echo $row['custom_email'];?>
						</td>
						<td>
							<?php echo $row['custom_address_ch'];?>
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
			<br/>
		</div>
	</div>

</body>

</html>