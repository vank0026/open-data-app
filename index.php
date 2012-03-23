<?php

require_once 'includes/db.php';
//	exect() allows us to perform SQL and not expect a result
//	the query thing allows us to perform SQL the database, and get something back

$results = $db->query('
	SELECT id, park_name, longitude, latitude, address, rate_count, rate_total
	FROM parks 
	ORDER BY park_name ASC');
		// the tabs above are for easier usage, not needed for funcitonality
		
?>		


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php if (isset($title)) { echo $title . ' � '; } ?>Comunity Gardens</title>
<link href="css/parks.css" rel="stylesheet">
<script src="js/modernizr.dev.js"></script>

</head>

<body>

	<h1>Comunity Gardens List</h1>

<ul id="list">
  <?php foreach ($results as $park) :?>
  
		<?php
            if ($park['rate_count'] > 0) {
            $rating = round($park['rate_total'] / $park['rate_count']);
            } else {
            $rating = 0;
            }
        ?>
  
  
			<li itemscope itemtype="http://schema.org/TouristAttraction" data-id=<?php echo $park['id']; ?>>
            
  			<!-- list of parks here -->
            
				<a href="single.php?id=<?php echo $park['id']; ?>" itemprop="name"><?php echo $park['park_name']; ?></a>
                
				<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                    <meta itemprop="longitude" content="<?php echo $park['longitude']; ?>">
                    <meta itemprop="latitude" content="<?php echo $park['latitude']; ?>">
                </span>
                
                <!-- ratings sections here -->
                
                    <ol class="rater">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php $class = ($i <= $rating) ? 'is-rated' : ''; ?>
                            <li class="rater-level <?php echo $class; ?>">★</li>
                        <?php endfor; ?>
                    </ol>
			</li>
		<?php endforeach; ?>
	</ul>

<p id="adminlink"><a href="admin/index.php">Admin Section</a></p>
	
<div id="map"></div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCOSF6EUJHi28FLeCSkKsQsG1gtn4vRkN4&sensor=false"></script>
   	<script src="js/park-finder.js"></script>

</body>
</html>
