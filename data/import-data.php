<?php

require_once '../includes/db.php';

$places_xml = simplexml_load_file('community-gardens.kml');

$sql = $db->prepare('
	INSERT INTO parks (park_name, address, longitude, latitude)
	VALUES (:park_name, :address, :longitude, :latitude)
');


foreach ($places_xml->Document->Folder[0]->Placemark as $place){
	$coords = explode(',', trim($place->Point->coordinates));
	$adr = '';

	foreach ($place->ExtendedData->SchemaData->SimpleData as $civic){
		if ($civic->attributes()->name == 'LEGAL_ADDR') {
			$adr = $civic;
		}
	}
	
	$sql->bindValue(':park_name', $place->name, PDO::PARAM_STR);
	$sql->bindValue(':address', $adr, PDO::PARAM_STR);
	$sql->bindValue(':longitude', $coords[0], PDO::PARAM_STR);
	$sql->bindValue(':latitude', $coords[1], PDO::PARAM_STR);
	$sql->execute();
}

//var_dump($sql->errorInfo());