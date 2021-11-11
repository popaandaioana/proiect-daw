<?php
echo '<html>
<head>
<title>Libraria online</title>
</head>
<center><h3><span style="color:blue">Librarie online</span></h3></center>
<div>
<p>
<span style="color:blue">Descrierea aplicatiei</span> <br>
Dorim ca vizitatorii sa cumpere carti, la fel ca intr-un magazin real. Ei vor putea sa se plimbe prin spatiul virtual, sa vada copertele cartilor si detalii despre acestea, sa-si puna fiecare carte intr-un cos de cumparaturi si la sfarsit sa se duca la casa pentru a plati. Fiecare carte va fi insotita si de o scurta descriere, deoarece nu vom avea un librar care sa faca acest lucru pentru noi. La fel ca intr-o librarie, cartile vor fi aranjate dupa domeniul caruia ii apartin. Vom pune la dispozitia vizitatorilor un motor de cautare pentru a gasi rapid ceea ce ii intereseaza, fara a fi nevoiti sa piarda timp pretios cautand prin rafturi.
</p>
</div>
<span style="color:blue">Baza de date diagrama entitate-relatie</span><br>
<img src="librarie.jpg">
<div>
<p>
<span style="color:blue">Tipuri de utilizatori</span><br>
Guest<br>
<ul>
<li>Cauta carte in librarie</li>
<li>Vizualizare sugestii (promotii, noutati)</li>
<li>Creare cont nou</li>
<li>Vizualizare recenzii produs</li>
<li>Filtrare dupa categorie (prin selectare domeniu)</li>
<li>Adaugare/stergere produs in cos</li>
<li>Vizualizare cos</li>
<li>Cumparare produs</li>
<li>Vizualizare recenzii produs</li>
</ul>
User<br>
<ul>
<li>Cauta carte in librarie</li>
<li>Vizualizare sugestii (promotii, noutati)</li>
<li>Vizualizare recenzii produs</li>
<li>Adaugare recenzie produs</li>
<li>Filtrare dupa categorie (prin selectare domeniu)</li>
<li>Adaugare/stergere produs in cos</li>
<li>Vizualizare cos</li>
<li>Cumparare produs</li>
<li>Vizualizare recenzii produs</li>
<li>Adaugare recenzie produs</li>
<li>Modificare detalii cont</li>
<li>Vizualizare istoric comenzi</li>
<li>Log in/Log out</li>
<li>Abonare newsletter</li>
</ul>
Admin<br>
<ul>
<li>Log in/Log out</li>
<li>Modificare baze de date:</li>
<ul>
<li>adaugare domeniu/produs</li>
<li>stergere domeniu/produs</li>
<li>modificare domeniu/produs</li>
<li>validare/stergere recenzie</li>
<li>adaugare/stergere/vizualizare users</li>
</ul>
<li>Modificare detalii cont</li>
</ul>
</p>
</div>'
?>