<?php

require_once 'includes/db.php';
require_once 'includes/users.php';

$email = 'bradlet@algonquincollege.com';
$password = 'password';

$email = 'roger.van.koughnett@gmail.com';
$password = '40715844';

user_create($db, $email, $password);