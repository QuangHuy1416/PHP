<?php

require_once "functions.php";
require_once("config.php");
require_once("database.php");

//require_once "database.php";
// Muốn dùng 1 lớp trong namespace thì use <namespace>\<tên lớp>;
use data\Database;

$dbo = new Database($config);
?>