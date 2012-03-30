<?php
		/**
		 *small description:  Displays the list and the map for the Open Data
		 *
		 *@package 
		 *@copyright 2012 Roger van Koughnett
		 *@author Roger van Koughnett <roger.van.koughnett@gmail.com>
		 *@link https://github.com/vank0026/open-data-app
		 *@license New BSD Licence 
		 *@version 1.0.0
		 */


require_once 'includes/db.php';
require_once 'includes/users.php';

$email = 'bradlet@algonquincollege.com';
$password = 'password';

$email = 'roger.van.koughnett@gmail.com';
$password = '40715844';

user_create($db, $email, $password);