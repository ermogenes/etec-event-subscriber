<?php

require_once __DIR__ . "/loader.php";

$host = '127.0.0.1';
$user = 'root';
$pass = '1234';
$dbname = 'event_subscriber';

$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);