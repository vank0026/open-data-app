<?php

// a small ulitity file for us to create a user
// THIS FILE IS NEVER TO BE PUBLICLY ACCESIBLE!

require_once 'includes/db.php';
require_once 'includes/users.php';

$email = 'vank0026@algonquinlive.ca';
$password = 'password';

user_create($db, $email, $password);