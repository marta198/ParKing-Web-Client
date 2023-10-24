<?php
ini_set('display_errors', 0);
session_start();
define('DBTYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'rest_api');
define('DB_CHARSET', 'utf8');
$conn = new PDO(DBTYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}