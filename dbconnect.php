<?php
	mysql_connect("localhost","manager","123") or die("Connection Failed");
	mysql_select_db("db");
	mysql_query("set names 'utf8'");
?>