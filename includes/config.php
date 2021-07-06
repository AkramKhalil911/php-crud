<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'DBEXPLAINED';

$con = "mysql:localhost=$host;dbname=$dbname;charset_utf8";
$db = new PDO($con, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>