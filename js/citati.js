function citati() {
	quotes = new Array(6);
    authors = new Array(6);
    quotes[0] = "Never give a sword to a man who can’t dance. - Nikad ne daj mač čoveku koji ne zna da igra";
    authors[0] = "Konfučije";
    quotes[1] = "Fighting was fun, this was the thing. Fighting was tremendous fun.  | Borba je mnogo zabavna, u tome je stvar. Borba je mnogo zabavna.";
    authors[1] = "Ewart Oakeshott";
    quotes[2] = "Inoltre la spada non è meno meravigliosa nella mano destra di una donna. | Штавише, мач није ништа мање опасан у десној руци жене.";
    authors[2] = "Francesco Antonio Mattei ";
    quotes[3] = "Čast se ne može oduzeti, ona se može samo izgubiti ";
    authors[3] = "Čehov";
    quotes[4] = "В бою фехтовальщик должен всеми силами стремиться действовать наступательно, овладевать инициативой и пространством поля боя, навязывая свой план боя противнику. | У борби, мачевалац мора свим силама настојати да делује офанзивно, да преузме иницијативу и простор бојног поља, намећући свој план борбе непријатељу.";
    authors[4] = "Хозиков Юрий Тихонович";
    quotes[5] = "Sono stato attratto da un desiderio naturale, fin dall'adolescenza, alla pratica del combattimento| Privlačila me je, od malena, prirodna želja za borbom";
    authors[5] = "Fiore dei Liberi";

    index = Math.floor(Math.random() * quotes.length);
    index =1;
    document.getElementById("citat").innerHTML = quotes[index]
    document.getElementById("author").innerHTML = authors[index]
}