<?php
session_start();

if (isset($_SESSION)) {
	unset($_SESSION['id']);
	unset($_SESSION['email']);
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['picture']);
	unset($_SESSION['uploaded_routes']);
}

session_destroy();

header("Location: index.php");

?>