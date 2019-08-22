<!DOCTYPE html>
<html>
<head lang="pl">
 
    <meta charset="utf-8">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="styles/lib_head.css">
    <link rel="stylesheet" href="styles/libraries.css">
    <link rel="stylesheet" href="https://code.jquery.com/qunit/qunit-2.9.2.css">

  
</head>
<body>


<?php

include "./head.php";

?>

<p class="lib">QUnit</p>

<section class="textq">
<p>
Testy jednostkowe są ważną częścią większych aplikacji. Najczęściej stosowane są w celu refaktoryzacji kodu, a więc poprawie struktury i jakości.
 Głównym zadaniem stworzonych testów jest poinformowanie programisty, czy dana część kodu dokonała to czego twórca oczekiwał. Qunit pozwala na tworzenie uporządkowanych strukturalnie testów.
  Korzystanie z 'unit testing' doda nam dodatkowych godzin pracy, jednak dzięki temu unikniemy błędów w przyszłości. 
 </p>

</section>

<section class="equal">
<p class="subtitle">equal</p>
<div class="mob">
<div class="qu">

<img src="images/qu1.png">
</div>
<div class="qur">
<img src="images/qu1p.png">
</div>
</div>
<p style="width:70%;text-align:center;margin-left:15%">(1,1,2) oznacza, że 1 z testów się nie powiódł, z kalkulacji wynika, że 111*1.6 to 177.6, jednak JavaScript używa standardu IEEE754 zapisu
liczb zmiennoprzecinkowych, jest to standard zapisu liczb przez komputery, który może w niektórych przypadkach prowadzić do utraty informacji...</p>
</section>


<section class="keylog">
<p class="subtitle">Sprawdzamy działanie KeyLoggera</p>
<div class="qu s">

<img style="width:100%" src="images/qu2.png">
</div>
<div class="qur">
<img style="width:90%;margin-left:5%;" src="images/qu3.png">
<p style="width:90%;margin-left:2.5%;line-height:1.5em;">Mamy tutaj test QUnit oraz Listener nasłuchujący eventu 'keydown'. Testy wykonywane są przy samym starcie strony, a więc zostaną wywołane 4 eventy 'keydown' dla każdego z 4 przycisków,
    na których wciśnięcie czeka Listener. Kody wciśniętych przycisków przechowywane są w tablicy log. Rezultat działania testu jest taki jakiego oczekiwaliśmy, a więc otrzymujemy informację o zgodności testu. 
    Do tablicy zapisywany jest każdy wciśnięty przycisk nie tylko 1 z 4 podanych. Zawartość tablicy:
</p>
<p id="log" style="width:90%;margin-left:2.5%;word-wrap:break-word;"></p>
</div>
<div id="nextAnimation">Kliknij literę A na swojej klawiaturze</div>
</section>

<footer id="foo" class="higher">
<p>&copy; Wszystkie prawa zastrzeżone.</p>
<p id="blink">Kontakt: jan.fiolka44@gmail.com</p>

</footer>



<script src="scripts/menu_script.js"></script>
<script src="https://code.jquery.com/qunit/qunit-2.9.2.js"></script>
<script src="scripts/tests.js"></script>
</body>
</html>