<div class="row"> <!-- podela prikaza -->

  <div class="col-md-6">
    <h2 class="page-header">
      Kontakt
    </h2>
    <style>
      .button {
        background-color: #7F0000;
        border: none;
        color: white;
        padding: 16px 32px;
        text-align: center;
        font-size: 16px;
        margin: 4px 2px;
        opacity: 0.6;
        transition: 0.3s;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
      }

      .button:hover {opacity: 1}
    </style>


    <?php

    $ime_i_prezime="";
    $email="";
    $telefon="";
    $poruka_naslov="";
    $poruka_tekst="";
    ?>

    <form method="post" action="contact.php"> <!-- pocetak forme -->
      <?php

      $mysqli = new mysqli("localhost", "root", "", "contact");

      if($mysqli->error)
      {
        die("Greska:" . $mysqli->error);
      }
      
      $ime_i_prezime="";
      $email="";
      $telefon="";
      $poruka_naslov="";
      $poruka_tekst="";
      //i ne treba mi da mi izbaci tacno tu poruku,ali isto kao order.php tj. narudzbenica da mi to cuva sve

      if(isset($_POST['posalji']))
      {

        $ime_i_prezime=$_POST['ime_i_prezime']; 
        $email=$_POST['email']; 
        $telefon=$_POST['telefon']; 
        $poruka_naslov=$_POST['poruka_naslov']; 
        $poruka_tekst=$_POST['poruka_tekst']; 


        $date = date('H:i, jS F'); 
        echo '<p>Naslov poruke: ' . $poruka_naslov . '</p>';
        echo '<p>Tekst poruke: ' . $poruka_tekst . '</p>';
        $izlaz = $date . "\t Ime i prezime:" . $ime_i_prezime . "  \t Email:" . 
        $email . "  \t Telefon:" . 
        $telefon . "\n\n";

      $fp = fopen("poruka.txt", 'a'); //vidi kako ovo da se prosledi i u bazu?tj. koji ti tip podatka treba za dati atribut pa po tome pravi tabelu(spoljni kljuc na tabelu korisnici)

       //sustinski samo ovde pokrenuti jos jedan insert za jednu novu tabelu
      flock($fp, LOCK_EX); 
      if (!$fp) 
      {
        echo '<p><strong> Vasa poruka ne moze biti obradjena trenutno.
        Pokusajte kasnije.</strong></p></body></html>';
        exit;
      }
      fwrite($fp, $izlaz, strlen($izlaz));
      flock($fp, LOCK_UN); 
      fclose($fp);
      echo '<p>Upisana poruka u fajl.</p>';
    }

    ?>


    <div class="form-group">
      <label for="ime_i_prezime">Vaše ime i prezime</label>
      <input type="text" class="form-control"  name="ime_i_prezime" id="ime_i_prezime" value="<?php echo $ime_i_prezime ?>" placeholder="Upišite Vaše ime i prezime">
    </div>
    <div class="form-group">
      <label for="email">Vaš e-mail</label>
      <input type="email" class="form-control"  name="email" id="email"  value="<?php echo $email ?>" placeholder="Upišite Vaš e-mail">
    </div>
    <div class="form-group">
      <label for="telefon">Vaš telefonski broj</label>
      <input type="tel" class="form-control"  name="telefon" id="telefon" value="<?php echo $telefon ?>" placeholder="Upišite Vaš telefonski broj">
    </div>
    <div class="form-group">
      <label for="poruka_naslov">Naslov poruke</label>
      <input type="text" class="form-control" name="poruka_naslov" id="poruka_naslov" value="<?php echo $poruka_naslov ?>" placeholder="Naslov Vaše poruke">
    </div>
    <div class="form-group">
      <label for="poruka_tekst">Tekst poruke</label>
      <textarea class="form-control" rows="5"  name="poruka_tekst" id="poruka_tekst" value="<?php echo $poruka_tekst ?>"></textarea>
          </div>

          <button type="submit" name="posalji" value="posalji" class="btn btn-warning btn-lg btn-block" style="background-color: #7F0000;">Pošaljite <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> </button>
        </form> <!-- kraj forme -->
      </div> 

      <div class="col-md-6">
        <h2 class="page-header">
          Gde se nalazimo
        </h2>
        <p><i class="fas fa-map-marker" aria-hidden="true"></i> Gavrila Principa 27, Beograd 11000 </p>
        <p><i class="fas fa-phone" aria-hidden="true"></i> +381 11 19461571</p>
        <p><i class="fas fa-envelope" aria-hidden="true"></i> macevalackaprodavnica@gmail.com</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d557.5885656144902!2d20.45536924283482!3d44.81274198939422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aace32825bf%3A0x30aa2d4ad19507ce!2sGavrila%20Principa%2C%20Beograd!5e0!3m2!1sen!2srs!4v1667235863178!5m2!1sen!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      
    </div> <!-- kraj podele prikaza -->