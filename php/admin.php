<html>
<head>
	<title> Podaci o studentima </title>
	

</head>

<body >
	<h2 > 
		Unos azuriranje podataka o korisnicima.
	</h2>
	<fieldset>
		<legend>Korisnici:</legend>
		<form method="post" action="index.php">

      <?php
      $mysqli = new mysqli("localhost", "root", "", "macevalacki_sajt");
      if($mysqli->error)
      {
        die("Greska:" . $mysqli->error);
      }

      $idKorisnika=""; //svugde pripazi fali li bilo email,bilo idKorisnika
      $prezime="";
      $ime="";
      $privilegija="";
      $email="";
      $sifra=""; 

      // Pretraga po prezimenu
      if(isset($_POST['trazi'])) 
      {
       $upit = "select * from korisnik WHERE prezime LIKE '" . $_POST['prezime'] . "'"; 
       $rez=$mysqli->query($upit); 
       if(!$rez)
       {
        print("Ne moze se izvrsiti upit! <br>"); 
        die($mysqli->error); 
      }
      if(!($red=$rez->fetch_assoc()))
      { 
        print("Nema trazenog korisnika po prezimenu!<br>"); 
      } 
      else 
      { 
        $prezime=$red['prezime']; 
        $ime=$red['ime'];
        //$idKorisnika=$red['idKorisnika'];

        $email=$red['email'];
        $sifra=$red['sifra'];
        $privilegija=$red['privilegija'];
      }
    }

  // Ispis svih korisnika
    elseif(isset($_POST['pisiSve'])) 
    {    

      $upit3 = "select * from korisnik";

      if(!($rez=$mysqli->query($upit3)))
      {
        print("Ne moze se izvrsiti upit! <br>");
        die($mysqli->errno()); 
      }
      if(!($red=$rez->fetch_assoc()))
      {
        print("Nema  korisnika u bazi <br>");
      }

    // Kreiranje tabele   
      else
      { 
        if ($rez->num_rows>1) 
        { 
          echo "<table border='2px'> <tr><th>ime: </th> 
          <th>prezime: </th> <th>Email:</th> <th>privilegija</th> </tr>";

          while($row = $rez->fetch_assoc()) 
          {
            echo "<tr> <td>" . 
            $row["ime"] . "</td>" . "<td>" . 
            $row["prezime"] . "</td>" . "<td>" . 
            $row["email"] . "</td>" . "<td>" . 
            $row["privilegija"] . "</td>" . "</tr>";
          }
          echo "</table><br><br>";
        } 
        else   
        {
          echo "1 rezultat."; 
        }

        $prezime=$red['prezime'];
        $ime=$red['ime'];
      $email =$red['email']; //OVO SREDITI
      $sifra=$red['sifra'];
      $privilegija=$red['privilegija'];
    } 
  }

  // D O D A V A NJ E   N O V O G   K O R I S N I K A
  elseif(isset($_POST['dodaj'])) 
  {



    /*if (empty($_SESSION['user']) || $_SESSION['privilegija'] != 'admin') {
      echo "<a href='login.html'>Link za logovanje</a><br>";
      die("Niste ulogovani, ili niste ulogovani kao administrator!");
    }*/


    if((!$_POST['ime'])||(!$_POST['prezime']) || (!$_POST['email'])||(!$_POST['privilegija']) || (!$_POST['sifra']))
    { 
      echo "Mora biti uneto ime, prezime,  email , sifra i privilegija";      
    }
    else
    {
      $upitdod = "insert into korisnik (ime, prezime, email ,sifra , privilegija)
      VALUES ('" . NULL
      . $_POST['ime'] . "','" 
      . $_POST['prezime'] . "','" 
      . $_POST['email'] . "','" 
      . $_POST['sifra'] . "','"
      . $_POST['privilegija'] . "')";  //OVO SREDITI

      if(!$rezd=$mysqli->query($upitdod))
      {
        print("Ne moze se izvrsiti upit!<br>");
        die($mysqli->errno);
      }
      $message="Dodat korisnik";
    }
  }

  // A Z U R I R A NJ E   P O S T O J E C E G   K O R I S N I K A
  elseif(isset($_POST['azuriraj'])) 
  {

    /*if (empty($_SESSION['user']) || $_SESSION['privilegija'] != 'admin') {
      echo "<a href='login.html'>Link za logovanje</a><br>";
      die("Niste ulogovani, ili niste ulogovani kao administrator!");
    }*/

    if((!$_POST['prezime'])||(!$_POST['ime']) || (!$_POST['privilegija'])||(!$_POST['email']) || (!$_POST['sifra']))
    {
      echo "Mora biti uneto prezime, ime, email, privilegija i sifra";
    }
    else{
      $upit="update korisnik SET 
      prezime = '" . $_POST['prezime'] . "', 
      ime = '" . $_POST['ime'] . "',
      email = '" . $_POST['email'] . "',
      sifra = '" . $_POST['sifra'] . "',
      privilegija = '" . $_POST['privilegija'] . "'
      WHERE email  = '" . $_POST['email'] . "'";
      if(!($rez=$mysqli->query($upit)))
      {
        print("Ne moze se izvrsiti azuriranje u tabeli!<br>");
        die($mysqli->error);
      }
      $message = "azuriran korisnik";
    }

    $prezime=$_POST['prezime'];
    $ime=$_POST['ime'];;
    $sifra=$_POST['sifra'];
    $email=$_POST['email'];
    //$idKorisnika=$_POST['idKorisnika'];
    $privilegija=$_POST['privilegija'];
  }

  // B R I S A NJ E   P O S T O J E C E G   K O R I S N I K A
  elseif(isset($_POST['obrisi'])) 
  {

     /*if (empty($_SESSION['user']) || $_SESSION['privilegija'] != 'admin') {
      echo "<a href='login.html'>Link za logovanje</a><br>";
      die("Niste ulogovani, ili niste ulogovani kao administrator!");
    }*/

    
    $upitbris = "DELETE from korisnik where email = '" . $_POST['email'] . "'";
    $rezb=$mysqli->query($upitbris);
    if(!$rezb)
    {
      print("Ne moze se izvrsiti brisanje!<br>");
      die($mysqli->error);      
    }
    printf("Obrisano redova: %d\n", $mysqli->affected_rows);
    $prezime="";
    $ime="";
    $sifra="";
    $email="";
    //$idKorisnika="";
    $privilegija="";
    if($mysqli->affected_rows!=0)
      $message="Slog je uspesno obrisan!";
  }

  $prezime=TRIM($prezime);
  $ime=TRIM($ime);
  $sifra=TRIM($sifra);
  $email=TRIM($email);
  $privilegija=TRIM($privilegija);
  //$idKorisnika=TRIM($idKorisnika);
  ?>

  <table class="auto-style1">
   <col span="1" align="left">
   <!-- <tr>
    <td> Korisnicki ID:</td>
    <td>
     <input name="idKorisnika " type="text" size="7" value="<?php echo $idKorisnika  ?>" style="width: 180px; border-radius: 4px; height: 30px;" align="left">
    </td>
  </tr> -->
  <tr>
    <td>prezime: </td>
    <td>
      <input name="prezime" type="text" size="7" value="<?php echo $prezime ?>" style="width: 180px; border-radius: 4px; height: 30px;" align="left">
    </td>
  </tr>
  <tr>
    <td>ime</td>
    <td>
     <input name="ime" type="text" size="7" value="<?php echo $ime ?>" style="width: 141px; border-radius: 4px; height: 30px;" align="left">
   </td>
 </tr>
 <tr>
  <td> Sifra:</td>
  <td>
   <input name="sifra" type="text" size="7" value="<?php echo $sifra  ?>" style="width: 180px; border-radius: 4px; height: 30px;" align="left">
 </td>
</tr>
<tr>
  <td> Privilegija:</td>
  <td>
   <input name="privilegija" type="text" size="7" value="<?php echo $privilegija  ?>" style="width: 180px; border-radius: 4px; height: 30px;" align="left">
 </td>
</tr>
<tr>
  <td> Email(elektronska posta):</td>
  <td>
   <input name="email" type="text" size="7" value="<?php echo $email  ?>" style="width: 180px; border-radius: 4px; height: 30px;" align="left">
 </td>
</tr>


</table>
<br>
<input class="button button3" type="submit" name="dodaj" value="dodaj" style="background-color:blue color:yellow; font-weight:bold; width: 100px; height: 40px;">
<input class="button button3" type="submit" name="azuriraj" value="azuriraj" style="background-color:blue color:yellow; font-weight:bold; width: 140px; height: 40px;">
<input class="button button3" type="submit" name="obrisi" value="obrisi" style="background-color:blue color:yellow; font-weight:bold; width: 140px; height: 40px;">
<br><br>
<input type="submit" name="trazi" value="trazi po prezimenu" style="background-color:blue color:yellow; font-weight:bold; width: 170px; height: 40px;">
<input type="submit" name="pisiSve" value="pisi sve korisnike" style="background-color:blue color:yellow; font-weight:bold; width: 170px; height: 40px;">
<br>
<br>
<br>
<br>

<?php
if(isset($message)){
  echo "<br><br>$message";
}
?>

</form>
</fieldset>
</body>
</html>	