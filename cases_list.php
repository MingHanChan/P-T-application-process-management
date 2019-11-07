<!DOCTYPE html>
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
	<meta charset="UTF-8">
	<link href="css/bootstrap.css" rel="stylesheet">
	<title>案件列表</title>
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
							<li><a href="add_case.html">案件</a>
							</li>
							<li role="separator" class="divider"></li>
							<li><a href="add_applyer.html">申請人</a>
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
			$query = "SELECT office_number, case_name, applyer_id, case_status FROM `cases` ORDER BY office_number";
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
			<!--
		echo "<p>申請人:";
		echo "<ul>";
		while($name = mysql_fetch_row($result)){
			echo "<li><a href=list_member.php?name=$name[0]>".$name[0]."</a></li>";
		}
		echo "</ul>";
		-->
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>本所編號</th>
						<th>案件名稱</th>
						<th>申請人</th>
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
							<?php echo $row['office_number'];?>
						</td>
						<td>
							<?php echo $row['case_name'] . "</a>";?>
						</td>
						<td>
							<?php echo "<a href=applyer_cases.php?applyer_id={$row['applyer_id']}>" . $name['custom_name_ch'] . "</a>";?>
						</td>
						<td>
							<?php echo "<a href=case_file.php?office_number={$row['office_number']}>". $row['case_status'] . "</a>";?>
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
					echo "<strong style=\"background-color:#DDD;color: #333;\">" . $page . "</strong>  ";
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
	<br/>
</body>

</html>