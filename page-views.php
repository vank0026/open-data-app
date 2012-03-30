<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Page Views</title>
</head>
<body>


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

// track how many times uou've viewed this page for this session


// turn on sessions

session_start();


// session info stored inthe $_SESSION superglobal
$_SESSION['page-view'] += 1;

?>

<strong>You have been here <?php echo $_SESSION['page-view']; ?> times.</strong>

</body>
</html>