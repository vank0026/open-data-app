<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
}

require_once 'includes/db.php';

$sql = $db->prepare('
	SELECT id, name, adr, lat, lng
	FROM dinobones
	WHERE id = :id
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
$results = $sql->fetch();

if (empty($results)) {
	header('Location: index.php');
	exit;
}

$title = $results['name'];

include 'includes/theme-top.php';

?>

<h1><?php echo $results['name']; ?></h1>
<dl>
	<dt>Address</dt><dd><?php echo $results['adr']; ?></dd>
	<dt>Longitude</dt><dd><?php echo $results['lng']; ?></dd>
	<dt>Latitude</dt><dd><?php echo $results['lat']; ?></dd>
</dl>

<?php

include 'includes/theme-bottom.php';

?>
