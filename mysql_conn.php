<?php
	$host = "127.0.0.1"; //mysql主机地址
	$user = "root"; //mysql 登录账户
	$pwd = "199387"; //mysql登录密码
	$dbname="alertinformation";
	
	
	$conn = new mysqli($host, $user, $pwd, $dbname); //连接数据库
	if (!$conn) {//判断
		echo '连接数据库失败: ' . mysql_error();
	}else{
		;
	}
?>