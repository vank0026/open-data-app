<?php

require_once '../includes/filter-wrapper.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	if (empty($id)) {
		header('Location: index.php');	// this is if there is no page
		exit;	//stop the PHP right here and immediately redirect the user, ONLY connect to the database if there is a statement to tmake
	}
require_once '../includes/db.php';

$sql = $db->prepare('
	DELETE FROM parks
	WHERE id = :id
	LIMIT 1	
');
	// to delete just one, limit one
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
header('Location: index.php');
exit;