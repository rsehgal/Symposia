<?php
//$sname='localhost';
//$uname='test';
//$passwd='test123';

//$sname='10.138.3.190';
$sname='localhost';
$uname='sympadmin';//'test';
$passwd='sympadmin';
$dbname='symposia';
$conn = new mysqli($sname, $uname, $passwd, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection Established...<br/>";


?>
