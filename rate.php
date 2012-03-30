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

require_once 'includes/db.php';
require_once 'includes/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$rate = filter_input(INPUT_GET, 'rate', FILTER_SANITIZE_NUMBER_INT);
$cookie = get_rate_cookie();

if (empty($id)) {
header('Location: index.php');
exit;
}

// Only allow the user to rate if:
// 1. there is no cookie, aka they haven't already rated
// 2. the rating value is greater than 0
// 3. the rating value is less than 5

if (isset($cookie[$id]) || $rate < 0 || $rate > 5) {
header('Location: single.php?id=' . $id);
exit;
}

$sql = $db->prepare('
UPDATE parks
SET rate_count = rate_count + 1, rate_total = rate_total + :rate
WHERE id = :id
');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->bindValue(':rate', $rate, PDO::PARAM_INT);
$sql->execute();

save_rate_cookie($id, $rate);

header('Location: single.php?id=' . $id);
exit;