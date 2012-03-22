<?php

/**
* Sets a cookie to remember the user has already voted.
* We have to remember the ID of every single thing they voted on
* and they must all be inside one single cookie--which is a string.
* So, we have to come up with a solution to store all the IDs
* and since we are storing the IDs, we may as well store what they rated.
*
* http://www.flickr.com/photos/andyfox/2534644455/sizes/o/in/photostream/
*
* Our cookie will look something like this:
* 1:4;5:3;6:2
*
* Or, translated:
* id:rate;id:rate;id:rate
*/
function save_rate_cookie ($id, $rate) {
$cookie = get_rate_cookie();

$rated = array();

foreach ($cookie as $key=>$value) {
$rated[] = $key . ':' . $value;
}

$rated[] = $id . ':' . $rate;
$cookie_content = implode(';', $rated);

// http://php.net/setcookie
// setcookie($name, $content, $expiry_time, $path);
// Cookie expirations are in seconds
setcookie('parks_rated', $cookie_content, time() + 60 * 60 * 24 * 365, '/');
}

/**
* Gets the cookie and splits it apart into its component pieces
*
* Takes:
* id:rate;id:rate;id:rate
* And translates to:
* array(
* id => rate
* , id => rate
* , id => rate
* )
*/
function get_rate_cookie () {
$cookie_content = filter_input(INPUT_COOKIE, 'parks_rated', FILTER_SANITIZE_STRING);

if (empty($cookie_content)) {
return array();
}

$rated = explode(';', $cookie_content);

$ratings = array();

foreach ($rated as $item) {
$pieces = explode(':', $item);
$ratings[$pieces[0]] = $pieces[1];
}

return $ratings;
}