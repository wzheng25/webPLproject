<?php
require 'config.php';
require 'ChromePhp.php';
require_once 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$MY_CLIENT_ID = '841498573297-kcsuu19a9b5tme9q6mjrqpkgdf53587h.apps.googleusercontent.com';
	$MY_CLIENT_SECRET = 'yR9q8VIOCNnGOaY6JUnZQjzd';
	ChromePhp::log("POST REACHED");

	//Create Google Client Object
	$client = new Google_Client();
	$client->setClientId($MY_CLIENT_ID);
	$client->setClientSecret($MY_CLIENT_SECRET);
	$client->addScope("email");
	$client->setAccessType("offline");
	$client->setApprovalPrompt("force");
	$client->setApplicationName("Run Cville");

	$oauth = new Google_Service_Oauth2($client);
	$id_token = $_POST['idtoken'];
	$payload = $client->verifyIdToken($id_token);

// If this ID token is valid 
if ($payload) {
	$connection = new mysqli($host, $username, $password, $dbname);
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}

	// Grab google info
	$id = $payload['sub'];
	$email = $payload['email'];
	$firstname = $payload['given_name'];
	$lastname = $payload['family_name'];
	$picture = $payload['picture'];

	//Create uploaded routes value
	$uploaded_routes = '';

	session_start();
	$_SESSION['id'] = $id;
	$_SESSION['email'] = $email;
	$_SESSION['firstname'] = $firstname;
	$_SESSION['lastname'] = $lastname;
	$_SESSION['picture'] = $picture;
	$_SESSION['uploaded_routes'] = $uploaded_routes;
	echo $_SESSION['picture'];

	if (userExists($id) === FALSE) {
		$sql = "INSERT INTO users (id, email, firstname, lastname, picture, uploaded_routes) VALUES ('$id', '$email', '$firstname', '$lastname', '$picture', '$uploaded_routes')";
		if ($connection->query($sql) === TRUE) {
			// ChromePhp::log("Verification Successful");
			echo "hi";
		} 
		else {
			echo "Error: " . $sql . "<br>" . $connection->error;
		}
		$connection->close();
	}
	else {
		echo "User already Exists";
		$connection->close();
	}
  }
}
function userExists($id) {
	require('config.php');
	$connection = new mysqli($host, $username, $password, $dbname);
	if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
		}
	$result = $connection->query("SELECT id FROM users WHERE id = '$id'");
	$connection->close();
	//If a user exists, return true
	if ($result->num_rows > 0) {
		return TRUE;
		}
	else {
		return FALSE;
		}
	}
?>