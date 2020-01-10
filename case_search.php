<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.css" rel="stylesheet">
	<title>查詢</title>
</head>

<body>
	<?php require('header.php'); ?>
	<form  method="post" action="show_case.php">
		<div class="form-group">
			<label class = "col-md-3">請輸入本所編號或專利商標名稱:</label>
			<input class = "col-md-5" type = "text" name = "search">
			<input class = "col-md-4" type="hidden"/> 
		</div>
		<div class="form-group text-left">
			<input class="btn btn-primary" type="submit" name="submit" value="搜尋"/>
		</div>
	</form>
</body>

</html>