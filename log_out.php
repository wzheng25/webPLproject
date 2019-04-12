<?php
session_start();

// Delete Session
if (isset($_SESSION)) {
	unset($_SESSION['id']);
	unset($_SESSION['email']);
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['picture']);
	unset($_SESSION['uploaded_routes']);
}

session_destroy();


// Delete Cookies
if (count($_COOKIE) > 0) {
	foreach ($_COOKIE as $key => $value) {
		// unset($_COOKIE[$key]);
		setcookie($key, '', time() - 3600);
	}
}

// Redirect user to index
header("Location: index.php");
?>