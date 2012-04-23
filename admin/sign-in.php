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

require_once '../includes/users.php';
require_once '../includes/db.php';

if (user_is_signed_in()){
	header('Location: index.php');
	exit;
}

$errors = array();
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors['email'] = true;
	}
	
	if (empty($password)){
		$errors['password'] = true;
	}
	
	if (empty($errors)){
		$user = user_get($db, $email);
		
		if(!empty($user)){
				if (passwords_match($password, $user['password'])){
					user_sign_in($user['id']);
					header('Location: index.php');
					exit();
			}else{
				$errors['password-no-match'] = true;
			}
		}else{
			$errors['user-non-existant'] = true;
		}
	}
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Sign In</title>
<link href="css/admin-style.css" rel="stylesheet">

<script src="js/modernizr.dev.js"></script>

</head>
<body>

<div class="inpage">

<p><a href="../index.php">Back to Home Area</a></p>

<form method="post" action="sign-in.php">
	<div>
    	<label for="email">E-Mail Address</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
    	<label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        
    </div> 
	
    <button type="submit">Sign In</button>
</form>
</div>

<footer>(C)Copyright 2012 Roger van Koughnett</footer>

</body>
</html>