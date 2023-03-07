<?php

// kreiramo konekciju ka bazi

$servername = "localhost";
$username = "root";
$password = "";
$db = "macevalacki_sajt";
//$db = "don22";// to za drugu bazu ne ovu sad aktivnu

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($mysqli->error)
			{
				die("Greska:" . $mysqli->error);
			}
//echo "Connected successfully";

