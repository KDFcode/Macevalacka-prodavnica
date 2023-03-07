<?php

session_start();

if(empty($_SESSION['user'])){
  echo "<a href='registracija.php'>Link za logovanje</a><br>";
  die("Niste ulogovani!");
  
}


echo "Vi ste ulogovani kao: ".$_SESSION['user'];
echo " <a href='logout.php'>Logout</a><br>";

//konekcija
require_once "konekcija.php";

// sql za citanje podataka iz baze
$sql = "SELECT * FROM `korisnik`";


$result = $conn->query($sql);

//var_dump($result);

if ($result->num_rows > 0) {

  echo "<table border=1>";
  echo "<tr><th>id</th>";
  echo "<th>ime</th>";
  echo "<th>prezime</th>";
  echo "<th>email</th>";
  echo "<th>privilegija</th>";
  echo "<th>admin</th></tr>";
  while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row['idKorisnika']."</td>"; 
        echo "<tr><td>".$row['ime']."</td>";
        echo "<td>".$row['prezime']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['privilegija']."</td>";
        echo "<td>
        
        <a href='izmena.php?id=".$row['idKorisnika']."'>izmena</a>
        
        </td></tr>";
             // <a href='izmena.php?id=".$row['ime']."'>izmena</a>
        
      }
      echo "</table>";
    } else {
      echo "nema podataka";
    }
    $conn->close();