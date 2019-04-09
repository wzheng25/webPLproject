<?php 

$hostname = 'localhost';
$dbname = 'runCvilleDB';
$username = 'webPLadmin';
$password = 'password';

$dsn = "mysql:host=$hostname;dbname=$dbname";

$conn = new mysqli($hostname, $username, $password);

$sql = "CREATE DATABASE runCvilleDB";

$conn->close();

// try 
// {
//     $db = new PDO($dsn, $username, $password);
// }
// catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
// {
//    $error_message = $e->getMessage();        
//    echo "<p>An error occurred while connecting to the database: $error_message </p>";
// }
// catch (Exception $e)       // handle any type of exception
// {
//    $error_message = $e->getMessage();
//    echo "<p>Error message: $error_message </p>";
// }

?>