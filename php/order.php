<?php

	$kolicina1 = $_POST['kolicina1']; 
	$kolicina2 = $_POST['kolicina2']; 
	$kolicina3 = $_POST['kolicina3'];
	$adresa = $_POST['adresa']; 
	
?>
<html>
	<head>
		<title>Shop</title>
	</head>
	<body>
		<h1>Obavljena narudzbenica</h1>
		<h2>Fiskalni racun</h2>
		<?php
			$date = date('H:i, jS F');  
			echo '<p>Roba narucena u ';
			echo $date;
			echo '</p>';
			
			echo '<p>Kupili ste sledece artikle: </p>';
			$ukupno = 0;
			$ukupno = $kolicina1 + $kolicina2 + $kolicina3;
			echo 'Kupljenih proizvoda: ' . $ukupno . '<br>';
			
			if ($ukupno == 0) 
			{
				echo 'Nista niste kupili!<br>';
			} else 
			{
				if ($kolicina1 > 0)
					echo $kolicina1 . ' Mač longsword<br>';
				if ($kolicina2 > 0)
					echo $kolicina2 . ' Maska<br>';
				if ($kolicina3 > 0)
					echo $kolicina3 . ' Rukavice <br>';
			}
			$ukupna_cena = 0.00;

			define('CENA1', 21400);
			define('CENA2', 11900);
			define('CENA3', 22700); //kad smo radili na predavanjima bilo define('CENA3', 1900); vidi da li ovde ne treba mozda zarez neki nesto
			$ukupna_cena = $kolicina1 * CENA1 + $kolicina2 * CENA2 + $kolicina3 * CENA3;
			$ukupna_cena = number_format($ukupna_cena, 2, ',', '.'); 
			
			echo '<p>Racun - suma: ' . $ukupna_cena . '</p>';
			echo '<p>Adresa za isporuku: ' . $adresa . '</p>';
			$izlaz = $date . "\t" . $kolicina1 . " Mač longsword, \t" . 
			$kolicina2 . " Maska, \t" . 
			$kolicina3 . " Rukavice, \t" . 
			$ukupna_cena. "\t". 
			$adresa . "\n\n";
	
			 $fp = fopen("narudzbina.txt", 'a'); //vidi kako ovo da se prosledi i u bazu?tj. koji ti tip podatka treba za dati atribut pa po tome pravi tabelu(spoljni kljuc na tabelu korisnici)
			 
			 //sustinski samo ovde pokrenuti jos jedan insert za jednu novu tabelu
			flock($fp, LOCK_EX); 
			if (!$fp) 
			{
				echo '<p><strong> Vasa porudzbina ne moze biti obradjena trenutno.
				Pokusajte kasnije.</strong></p></body></html>';
				exit;
			}
			fwrite($fp, $izlaz, strlen($izlaz));
			flock($fp, LOCK_UN); 
			fclose($fp);
			echo '<p>Upisani podaci u fajl.</p>';
		?>
	</body>
</html>