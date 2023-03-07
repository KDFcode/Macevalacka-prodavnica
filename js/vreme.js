	function Vreme(){
		time = new Date();
		cas=time.getHours();
		minuti=time.getMinutes();
		sekunde=time.getSeconds();
		//ocument.write(cas);
		temp = "" + ((cas>12)?cas-12:cas);
		temp += ((minuti<10)?":0":":")+minuti;
		temp += ((sekunde<10)?":0":":")+sekunde;
		temp += ((cas>=12)?" PM ":" AM");
		document.vremeForma.cifre.value=temp;
		setTimeout("Vreme()",1000);
		//posle svakih 1000milisekundi, odnosno 1 sekunde
		//ponovo se ucitava funkcija Vreme()
	}