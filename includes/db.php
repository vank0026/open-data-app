<?php 
// get the enviornment variable we created in.htaccess
//this is the best way to keep usernames and passwords out of puclic github repos

$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$dsn = getenv('DB_DSN');

// open the connection to the database and stores it in a bariable
$db = new PDO($dsn, $user, $pass);

// makes sure we talk to the database in UTF-8
$db->exec('SET NAMES utf8');
?>