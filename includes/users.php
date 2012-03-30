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

function user_create($db, $email, $password) {
	$hashed_password = get_hashed_password($password);
	var_dump($hashed_password);
	
	$sql = $db->prepare('
		INSERT INTO  users (email, password)
		VALUES (:email, :password)
		');
		
		$sql->bindValue(':email', $email, PDO::PARAM_STR);
		$sql->bindValue(':password', $hashed_password, PDO::PARAM_STR);
		$sql->execute();
}

function get_hashed_password($password) {
	// uses open ssl 
	// it helps with the security and the Blowfish algorith requires it
	$rand = substr(strtr(base64_encode(openssl_random_pseudo_bytes(16)), '+', '.'), 0, 22);
	$salt = '$2a$12' . $rand;
	
	return crypt($password, $salt);
}

function user_is_signed_in () {
	session_start ();
	
	if (
		isset($_SESSION['id'])
		&& !empty($_SESSION['id'])
		&& isset($_SESSION['fingerprint'])
		&& $_SESSION['fingerprint'] == get_fingerprint($_SESSION['id'])
	){
		return true;
	}
	
	return false;
}

function get_fingerprint($id) {
	return sha1($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $id . session_id());
}

function user_get($db, $email) {
	$sql = $db->prepare('
		SELECT id, email, password
		FROM users
		WHERE email = :email
	');
		$sql->bindValue(':email', $email, PDO::PARAM_STR);
		$sql->execute();
	return $sql->fetch();
}

function passwords_match ($password, $stored_hash){
	return crypt($password, $stored_hash) == $stored_hash;
}


function user_sign_in($id) {
	session_regenerate_id();
	$_SESSION['id'] = $id;
	$_SESSION['fingerprint'] = get_fingerprint($id);
}

function user_sign_out(){
	session_start();
	$_SESSION = array();
	session_destroy();
}