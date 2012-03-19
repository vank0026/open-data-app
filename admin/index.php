<?php

require_once 'includes/db.php';
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
<title><?php if (isset($title)) { echo $title . ' · '; } ?>Parks</title>
<script src="js/modernizr.dev.js"></script>
</head>

<body>

	<ul>

	<a href="add.php">Add a Park!</a>
	
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
	<p><a href="../index.php">Back to Home Area</a></p>
</body>
</html>