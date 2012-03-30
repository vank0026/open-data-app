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

require_once '../includes/filter-wrapper.php';


$errors = array();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$park_name = filter_input(INPUT_POST, 'park_name', FILTER_SANITIZE_STRING);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_STRING);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);

if (empty($id)){
	header('Location: index.php');
	exit();
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (empty($park_name)){
		$errors['park_name'] = true;
	}
	if (empty($longitude)){
		$errors['longitude'] = true;
	}
	if (empty($latitude)){
		$errors['latitude'] = true;
	}
	if (empty($address)){
		$errors['address'] = true;
	}
	if (empty($errors)){
		require_once '../includes/db.php';
		
		$sql = $db->prepare('
			UPDATE parks
			SET park_name = :park_name, longitude = :longitude, latitude = :latitude, address = :address
			WHERE id = :id
			
		');
		$sql->bindValue(':park_name', $park_name, PDO::PARAM_STR);
		$sql->bindValue(':longitude', $longitude, PDO::PARAM_STR);
		$sql->bindValue(':latitude', $latitude, PDO::PARAM_STR);
		$sql->bindValue(':address', $address, PDO::PARAM_STR);
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
}else{
	require_once '../includes/db.php';
	
	$sql = $db->prepare('
		SELECT id, park_name, longitude, latitude, address
		FROM parks 
		WHERE id = :id
		');
	
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->execute();
		$results = $sql->fetch();
		
		$park_name = $results['park_name'];
		$longitude = $results['longitude'];
		$latitude = $results['latitude'];
		$address = $results['address'];
	
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Edit the Comunity Garden</title>
<link href="css/admin-style.css" rel="stylesheet">

</head>
<body>

<form method="post" action="edit.php?id=<?php echo $id; ?>">
	<div>
		<label for="park_name">Park Name <?php if (isset($errors["park_name"])) : ?><strong>Required</strong> <?php endif; ?></label>
		<input id="park_name" name="park_name" value="<?php echo $park_name; ?>" required>
	</div>
	<div>
		<label for="longitude">Longitude <?php if (isset($errors["longitude"])) : ?><strong>Required</strong> <?php endif; ?></label>
		<input id="longitude" name="longitude" value="<?php echo $longitude; ?>" required>
	</div>
	<div>
		<label for="latitude">Latitude <?php if (isset($errors["latitude"])) : ?><strong>Required</strong> <?php endif; ?></label>
		<input id="latitude" name="latitude" value="<?php echo $latitude; ?>" required>
	</div>
	<div>
		<label for="address">Address <?php if (isset($errors["address"])) : ?><strong>Required</strong> <?php endif; ?></label>
		<input id="address" name="address" value="<?php echo $address; ?>" required>
	</div>
	<button type="submit">Save to List</button>
</form>
<p><a href="index.php">Back to Admin Area</a></p>
</body>
</html>