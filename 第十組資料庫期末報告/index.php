<!DOCTYPE html>
<html>

	<head>
	<meta charset="UTF-8">
		<title>登入系統</title>
			<link href="css/bootstrap.css" rel="stylesheet">

	</head>
	<body>
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
		<form name="log_in" method="post" action="login.php">
			<center><font color=indigo ><b>帳號: </b></font><input type="text" name="account"><center><br>
			<center><font color=indigo ><b>密碼: </b></font><input type="password" name="password"><center><br>
			<input type="submit" name="submit" value="登入">
		</form>	

	</body>

</html>
