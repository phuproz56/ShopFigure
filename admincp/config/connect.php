<?php
	//  mysql:host=localhost : tên máy trong mysql
	
	$dsn = "mysql:host=localhost;dbname=web_mumei_shop";
	$username = "root";
	$password = "";
   try {
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $db) { // Exception : bắt ngoại lệ 
	echo 'Không thể kết nối đến MySQL,
	kiểm tra lại username/password đến MySQL.<br>';
	exit("<pre>${db}</pre>");
}

?>