<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "Symposia.php";

$obj = new DB();
$obj->Set('127.0.0.1','sympadmin','sympadmin','symposia');
$obj->Connect();

?>
