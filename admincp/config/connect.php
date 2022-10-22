<?php
	$dsn = "mysql:host=localhost;dbname=web_mumei_shop";
	$username = "root";
	$password = "";
   try {
	$db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
	echo 'Không thể kết nối đến MySQL,
	kiểm tra lại username/password đến MySQL.<br>';
	exit("<pre>${ex}</pre>");
}
?>