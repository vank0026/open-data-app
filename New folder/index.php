<?php

require_once 'includes/db.php';

$results = $db->query('
	SELECT id, name, adr, lat, lng
	FROM dinobones
	ORDER BY name ASC
');

include 'includes/theme-top.php';

?>

<ol class="dinos">
<?php foreach ($results as $dino) : ?>
	<li itemscope itemtype="http://schema.org/TouristAttraction">
		<a href="single.php?id=<?php echo $dino['id']; ?>" itemprop="name"><?php echo $dino['name']; ?></a>
		<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
			<meta itemprop="latitude" content="<?php echo $dino['lat']; ?>">
			<meta itemprop="longitude" content="<?php echo $dino['lng']; ?>">
		</span>
	</li>
<?php endforeach; ?>
</ol>

<div id="map"></div>

<?php

include 'includes/theme-bottom.php';

?>
