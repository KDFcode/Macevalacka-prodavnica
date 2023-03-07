<?php



session_start();

if (empty($_SESSION['user']) || $_SESSION['privilegija'] != 'admin') {
    echo "<a href='login.html'>Link za logovanje</a><br>";
    die("Niste ulogovani, ili niste ulogovani kao administrator!");
}







?>
<form action="<?php $_SERVER['PHP_SELF'] ?>">
    <input type="text" name="nId" readonly value="<?php echo filter_input(INPUT_GET, 'nId', FILTER_SANITIZE_STRING); ?>">
    <select name="nPrivilegija" id="nPrivilegija">
        <option value="admin">admin</option>
        <option value="korisnik">korisnik</option>
    </select>
    <input type="text" name="email" readonly value="<?php echo filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRING); ?>">

    <input type="submit" name="bPotvrdi" value="Potvrdi">
</form>


<?php
// sql za update
$privilegija = $_GET['nPrivilegija'] ?? "";
$id = $_GET['nId'] ?? "";


$sql = "UPDATE `korisnici` SET `privilegija` = '$privilegija' 
WHERE `korisnici`.`idKorisnika` = $id";


// konekcija sa bazom
require_once "konekcija.php";

if (isset($_GET['bPotvrdi'])) {
    if ($conn->query($sql) === TRUE) {
        echo "Podaci su promenjeni";
        header('Location:operacije.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} 
