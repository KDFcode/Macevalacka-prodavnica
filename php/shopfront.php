<div class="page-header">
  <h2>Shop </h2>
</div>
<form action="php/order.php" method="post">  <!-- otvaramo formu prodavnice a zatvaramo je pre footera -->
 <div class="row"><!-- otvoren red za thumnails -->
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <h3>Mač longsword</h3>
      <img src="img/pic19-1.png" alt="..." >
      <div class="caption">
        <p>Mač dug 125cm, težak 1,35kg, tupe oštrice, bezbedan za sparing, flex 5kg pritiska</p>
        <p>Cena<strong> 21.400,00 </strong></p>
        <label for="jedan"></label><input type="text" id="jedan" name="kolicina1" size="3" placeholder="0">
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <h3>Maska</h3>
      <img src="img/pic20.png" alt="..." >
      <div class="caption">
        <p>Zaštitna maska jake metalne mreže,s kragnom od višeslojne neprobojne tkanine</p>
        <p>Cena<strong> 11.900,00 </strong></p>
        <label for="dva"></label><input type="text" id="dva" name="kolicina2" size="3" placeholder="0">
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <h3>Rukavice</h3>
      <img src="img/pic18.png" alt="..." >
      <div class="caption">
        <p>Zaštitne rukavice od tvrde plastike koje štite ruke iz svih uglova</p>
        <p>Cena<strong> 22.700,00 </strong></p>
        <label for="tri"></label><input type="text" id="tri" name="kolicina3" size="3" placeholder="0">
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <tr>
      <td>Adresa za isporuku</td>
      <td align=center> <input type="text" name="adresa" size=40 maxlength=40></td>
    </tr>
    <input type="submit" value="Poruci"> 
  </div>
</div>
</form>