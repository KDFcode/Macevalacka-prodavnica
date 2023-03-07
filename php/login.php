
<?php 

$user="";
$password3="";
if (isset($_POST['uloguj']))
{
				//sesija
	session_start();


	$user = $_POST['user']??"";
	$user = filter_var($user,FILTER_SANITIZE_STRING);

	$pass = $_POST['password3']??"";
	$pass = filter_var($pass,FILTER_SANITIZE_STRING);

	if(strlen($user)<=2 || strlen($pass)<=2){
		die("Korisnicko i sifra moraju imati bar 3 karaktera");
	}

// konekcija sa bazom ucitavanjem fajla konekcija.php 
	require_once('konekcija.php');

// sql za citanje podataka iz baze
	$sql = "SELECT * FROM `korisnik` 
	WHERE `email`='$user' and `sifra`=sha1('$password3')";

	$result = $conn->query($sql);

//var_dump($result);

	if ($result->num_rows > 0) {
  // output data of each row
		while($row = $result->fetch_assoc()) {
			$_SESSION['user'] = $row['email'];
			$_SESSION['privilegija'] = $row['privilegija'];
    //echo "user: ".$row['ime']. " privilegija: ".$row['privilegija'];
			header('Location:operacije.php');
		}
	} else {
		echo "Takav korisnik ne postoji!";
	}
	$conn->close();



				



	?>