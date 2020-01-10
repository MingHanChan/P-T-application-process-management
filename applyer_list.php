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
	<?php require('header.php');?>
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