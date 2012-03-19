<?php

require_once '../includes/filter-wrapper.php';


$errors = array();
$park_name = filter_input(INPUT_POST, 'park_name', FILTER_SANITIZE_STRING);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_STRING);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);

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
			INSERT INTO parks (park_name, longitude, latitude, address)
			VALUES (:park_name, :longitude, :latitude, :address)
		');
		$sql->bindValue(':park_name', $park_name, PDO::PARAM_STR);
		$sql->bindValue(':longitude', $longitude, PDO::PARAM_STR);
		$sql->bindValue(':latitude', $latitude, PDO::PARAM_STR);
		$sql->bindValue(':address', $address, PDO::PARAM_STR);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}

}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Add A Comunity Garden</title>
<link href="css/admin-style.css" rel="stylesheet">

</head>
<body>

<form method="post" action="add.php">
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

	<button type="submit">Add to List</button>
</form>
<p><a href="index.php">Back to Admin Area</a></p>
</body>
</html>