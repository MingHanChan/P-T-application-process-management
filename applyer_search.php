<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.css" rel="stylesheet">	
	<title>查詢</title>
	</head>
	<body>
	<?php require('header.php');?>
	<form  method="post" action="show_applyer.php" >
		<div class="form-group form-row" >
			<label class="col-md-2">請輸入姓名或身分證號:</label>
			<input class="col-md-3" type = "text" name = "search"/>
			<input class="col-md-7" type = "hidden"/>
		</div>
		<input class="btn btn-primary" type="submit" name="submit" value="搜尋">
		
	</form>
	</body>
</html>