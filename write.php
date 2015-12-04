<!DOCTYPE HTML>
<html> 
<body>

<form action="" method="post">
date: <input type="text" name="dateIn"><br>
close: <input type="text" name="closeIn"><br>
<input type="submit">
</form>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	echo "asdasdasdasda";
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO graph (date, close) VALUES (?, ?)");
$stmt->bind_param("sd", $firstname, $lastname);

// set parameters and execute
$firstname = $_POST["dateIn"];
$lastname = $_POST["closeIn"];
$stmt->execute();



$stmt->close();
$conn->close();
?>

</body>
</html>

