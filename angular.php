<!DOCTYPE html>
<html>
<head lang="pl">
 
    <meta charset="utf-8">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="styles/lib_head.css">
    <link rel="stylesheet" href="styles/libraries.css">

 

    <script type="text/paperscript" src="scripts/sketch.js" canvas="cnv"></script>
</head>
<body>


<?php

include "./head.php";

?>

<p class="lib">Angular</p>

<section class="texta">
<p>
 Framework to coś więcej niż biblioteka. Język, ktorym posługujemy się pisząc aplikacje za pomocą Angulara to TypeScript, który jest kompilowany do JavaScripta przed ukazaniem aplikacji w przeglądarce.
 Angular ma wiele wersji. Najnowszą z nich jest Angular 7, natomiast framework rozwija się tak szybko, że najpewniej po paru tygodniach od wypuszczenia tej strony, ukaże się już Angular 8.
 Budując aplikacje, często potrzebujemy dużo więcej niż jednej biblioteki. Angular to wielki zestaw narzędzi, z których można wybierać. Struktura TypeScripta jest bardziej zbliżona do języków programowania wyższego poziomu.
 Dzięki budowie aplikacji, Angular ułatwia pracę w dużych drużynach. Jest to Framework przeznaczony do tworzenia wysoce interaktywnej, jednostronowej aplikacji.
 </p>

</section>

<section class="budowa">
<p class="subtitle">Budowa Aplikacji</p>
<p>Głownymi składowymi aplikacji są Moduły, Komponenty oraz Usługi. Głównym Modułem jest AppModule. Bez niego aplikacja nie zadziała. Moduł składa się z komponentów, a każdy komponent może składać się z kolejnych mniejszych komponentów.
Dodatkowo Modół może zawierać Usługi, których używać będą poszczególne komponenty.</p>
<img src="images/angularbuild.png">
<p style="margin-top:2em">Każdy z komponentów aplikacji, zawiera swój osobny plik HTML, CSS oraz TypeScript. Dzięki tej strukturze można łatwo podzielić się pracą, działając w drużynach.</p>

</section>


<section class="example">
<p class="subtitle">Przykładowa aplikacja</p>
<div class="info">
<img src="images/angularex1.png" style="width:100%">
<p style="line-height:1.45em;">Oto struktura aplikacji mojego Portfolio. Modół app zawiera komponent app, który jest głównym komponentem aplikacji. Dalej mamy 3 komponenty podrzędne: content, login oraz navigation. navigation posiada jeszcze 1 komponent podrzędny, którym jest option.
W podkatalogu login, znajduje się loginService, które component używa do komunikacji z bazą danych.
Dzięki takim możliwością Angulara jak "Two Way Binding", narzędziu EventEmitter i obiektom Input, Output, możemy osiągnąć płynną komunikację pomiędzy poszczególnymi komponentami. W przypadku tej aplikacji, zmiana zaznaczanej opcji w nawigacji, wpływa na komponent content, którego zawartość ulega dynamicznej zmianie.

</p>
</div>

</section>

<footer id="foo" class="foota">
<p>&copy; Wszystkie prawa zastrzeżone.</p>
<p id="blink">Kontakt: jan.fiolka44@gmail.com</p>

</footer>



<script src="scripts/menu_script.js"></script>
</body>
</html>