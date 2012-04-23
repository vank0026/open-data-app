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

if (!user_is_signed_in()){
	header('Location: sign-in.php');
	exit;
}

require_once '../includes/db.php';
//	exect() allows us to perform SQL and not expect a result
//	the query thing allows us to perform SQL the database, and get something back
$results = $db->query('
	SELECT id, park_name, longitude, latitude, address
	FROM parks 
	ORDER BY park_name ASC');
		// the tabs above are for easier usage, not needed for funcitonality
?>		

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php if (isset($title)) { echo $title . ' � '; } ?>Comunity Gardens</title>
<link href="css/admin-style.css" rel="stylesheet">

<script src="js/modernizr.dev.js"></script>
</head>

<body>
	<a href="add.php">Add a Comunity Garden!</a>

    
    <ul id="list">
	
		<?php
			foreach ($results as $park) :?>
			<li>
			<?php echo $park['park_name']; ?>
			---
   			<a href="edit.php?id=<?php echo $park['id']; ?>">Edit</a>
			<a href="delete.php?id=<?php echo $park['id']; ?>">Delete</a>

			</li>
		<?php endforeach; ?>
	</ul>

<p><a href="../admin/sign-out.php">Sign Out</a></p>
<footer>(C)Copyright 2012 Roger van Koughnett</footer>

</body>
</html>