<?php
require_once 'db-install.php';
try {
$dbh = new PDO('mysql:dbname=;host=localhost', $log, $passw);
} catch (PDOException $e) {
    die($e->getMessage());
}








