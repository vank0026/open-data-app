<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Page Views</title>
</head>
<body>


<?php

// track how many times uou've viewed this page for this session


// turn on sessions

session_start();


// session info stored inthe $_SESSION superglobal
$_SESSION['page-view'] += 1;

?>

<strong>You have been here <?php echo $_SESSION['page-view']; ?> times.</strong>

</body>
</html>