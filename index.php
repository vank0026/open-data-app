<?php

require_once 'includes/db.php';
//	exect() allows us to perform SQL and not expect a result
//	the query thing allows us to perform SQL the database, and get something back

$results = $db->query('
	SELECT id, park_name, longitude, latitude, address
	FROM parks 
	ORDER BY park_name ASC');
		// the tabs above are for easier usage, not needed for funcitonality
		
include 'includes/theme-top.php';

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
	
		<?php foreach ($results as $park) :?>
			<li itemscope itemtype="http://schema.org/TouristAttraction">
				<a href="single.php?id=<?php echo $park['id']; ?>"><?php echo $park['park_name']; ?></a>
				<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
				<meta itemprop="longitude" content="<?php echo $park['longitude']; ?>">
				<meta itemprop="latitude" content="<?php echo $park['latitude']; ?>">
		</span>
			</li>
			
		<?php endforeach; ?>
	</ul>

	<p><a href="admin/index.php">Admin Section</a></p>
	
<div id="map"></div>
	
<?php

include 'includes/theme-bottom.php';

?>