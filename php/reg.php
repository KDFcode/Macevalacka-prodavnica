<div class="row">
	<div class="col-md-6"> <!-- leva strana prikaza -->
		<div class="page-header">
			<h2>Registruj se</h2>
		</div>

		

		<br>
		<form method="post" action="registracija.php"> 
			<?php

			$mysqli = new mysqli("localhost", "root", "", "macevalacki_sajt");

			if($mysqli->error)
			{
				die("Greska:" . $mysqli->error);
			}
			$ime="";
			$prezime="";
			$email="";
			$password1="";
			$password2="";
			$user="";
			$password3="";
			


			if(isset($_POST['dodaj']))
			{
				
				if((!$_POST['ime'])||(!$_POST['prezime']) || (!$_POST['email'])||(!$_POST['password1']) || (!$_POST['password2']))
				{
					echo "Mora biti uneto ime, prezime, email, i passwordi";      
				}

				else
				{
					

					$ime=$_POST['ime'];
					$prezime=$_POST['prezime'];
					$email=$_POST['email'];
					$pass=$_POST['password1'];



					$sql = "INSERT INTO `korisnik` 
					(`idKorisnika`, `ime`, `prezime`, `email`, `sifra`, `privilegija`) 
					VALUES (NULL, '$ime', '$prezime, '$email', SHA1('$pass'), 'korisnik');";

					


					/*$upitdod = "insert into korisnik (id, ime, prezime, email, password1, privilegija)
					VALUES ('" . NULL 
					. "','" . $_POST['prezime']
					. "','" . $_POST['prezime']
					. "','" . $_POST['email'] 
					. "','" . sha1($_POST['password1']) 
					. "','" . 'korisnik'
					. "');";*/

					

					if ($_POST['password1']===$_POST['password2']) 

						$rezd=$mysqli->query($upitdod); 
					
					else $rezd=false;   
					if($rezd)
					{
						?>  
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Success!</strong> Uspešno ste se registrovali!
						</div> 
						<?php  
					} 
					else
					{
						?> 
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Danger!</strong> Neuspešno registrovanje
						</div>
						<?php
					}
				}
			}

			?>

			<!-- HTML FORMA -->
			<div class="form-group">
				<label for="ime">Vaše ime</label>
				<input type="text" class="form-control" id="ime" name="ime" value="<?php echo $ime ?>" placeholder="Unesite vaše ime" required>
			</div>
			<div class="form-group">
				<label for="prezime">Vaše prezime</label>
				<input type="text" class="form-control" id="prezime" name="prezime" value="<?php echo $prezime ?>" placeholder="Unesite vaše prezime" required>
			</div>
			<div class="form-group">
				<label for="email">Email(elektronska posta) adresa</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" placeholder="Unesite vašu e-mail adresu" required>
			</div>
			<div class="form-group">
				<label for="password1">Lozinka/Password</label>
				<input type="password" class="form-control" id="password1" name="password1" value="<?php echo $password1 ?>"placeholder="Unesite vašu lozinku" required>
			</div>
			<div class="form-group">
				<label for="password2">Lozinka/Password</label>
				<input type="password" class="form-control" id="password2" name="password2" value="<?php echo $password2 ?>" placeholder="Ponovite vašu lozinku" required>
			</div>
			<button type="submit" name="dodaj" value="dodaj" class="btn btn-warning btn-lg btn-block" style="background-color: #7F0000;">Registruj se <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> </button>
		</div>
	</form>


	<form method="post" action="login.php"> 
		<div class="col-md-6"> <!-- desna strana prikaza -->
			<div class="page-header">
				<h2>Uloguj se</h2>
			</div>
			<div class="form-group">
				<label for="user">Email(elektronska posta) adresa</label>
				<input type="email" class="form-control" id="user" value="<?php echo $user ?>" placeholder="Unesite vašu e-mail adresu">
			</div>
			<div class="form-group">
				<label for="password3">Lozinka/Password</label>
				<input type="password" class="form-control" id="password3" value="<?php echo $password3 ?>" placeholder="Unesite vašu lozinku">
			</div>
			<button type="submit" name="uloguj" class="btn btn-success btn-lg btn-block" style="background-color: #7F0000;">Uloguj se <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>

			<!-- lozinka
				admin@admin.rs admin123,asdfasd@dfa.rs  user123 -->
			</div> <!-- kraj desne strane -->
		</form>
</div> <!-- kraj podele prikaza -->