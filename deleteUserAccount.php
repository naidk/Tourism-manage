<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<?php

$servername = "localhost";
$usernameConn = "root";
$passwordConn = "";
$dbname = "projectmeteor";
$port = 3307;

// Create connection
$conn = new mysqli($servername, $usernameConn, $passwordConn, $dbname, $port);
	
	// Checking if successfully connected to the database
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$user = $_SESSION["username"];
	
	$deleteUserSQL = "DELETE FROM `users` WHERE Username='$user'";
	$deleteUserQuery = $conn->query($deleteUserSQL);

	$deleteFlightBookingsSQL = "DELETE FROM `flightbookings` WHERE Username='$user'";
	$deleteFlightBookingsQuery = $conn->query($deleteFlightBookingsSQL);

	/*-------------------------------------------------------------------------------
	
	
			deleted flight bookings and account details of users
	
	
	-------------------------------------------------------------------------------*/


?>