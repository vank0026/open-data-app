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
<title>Parks</title>

</head>

<body>

	<ul>
		<?php
		/*
		foreach ($results as $park) {
		echo '<li>' . $park['park_name'] . '</li>';
		}
		*/
		?>
	
		<?php
			foreach ($results as $park) :?>
			<li>
			<a href="single.php?id=<?php echo $park['id']; ?>"><?php echo $park['park_name']; ?></a>
			</li>
		<?php endforeach; ?>
	</ul>

	<p><a href="admin.php">Admin Section</a></p>
</body>
</html>