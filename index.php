<!DOCTYPE html>
<html>
<head lang="pl">
 
    <meta charset="utf-8">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="styles/lib_head.css">
    <link rel="stylesheet" href="styles/libraries.css">

    <script src="./paper-full.min.js"></script>

    <script type="text/paperscript" src="scripts/sketch.js" canvas="cnv"></script>
</head>
<body>


<?php

include "./head.php";

?>


    <section style="height:23em;">
      <canvas id="cnv" resize></canvas>
      </section>

<main>

  <div class="designblock"></div>


   <article>
     <div class="content">
     <a href="jquery.php">
    <div class="logo"><img src="images/jquery.gif"></div>
    <h2>JQuery</h2>
    <p>
     Najpopularniejsza biblioteka JavaScript. Lekka biblioteka, ułatwiająca zarządzanie elementami DOM, obsługiwanie zdarzeń, czy tworzenie animacji. 
     Dzięki tej bibliotece można zaoszczędzić parę linijek kodu, korzystając z gotowych funkcji, co o wiele skraca czas pracy.

    </p>
    </a>
     </div>

   </article>
     <article>
        <div class="content">
        <a href="qunit.php">
        <div class="logo"><img src="images/qunit.png"></div>
    <h2>QUnit</h2>
    <p>
      Biblioteka stosowana do tworzenia testów jednostkowych, przydaje się ona przy większych aplikacjach, kiedy wprowadzanie zmian i testowanie
      aplikacji zajmuje sporo czasu. Sprawdzamy poszczególne bloki kodu pod względem rezultatu działania. W ten sposób z łatwością znajdujemy błędy. 
    </p>
    </a>
      </div>
   </article>

     <article>
        <div class="content">
        <a href="chart.php">
        <div class="logo"><img src="images/chartjs.svg">
            
            </div>
        <h2>Chart.js</h2>
            <p>
                            Biblioteka, która jest jednym z najlepszych rozwiązań, jeśli mamy na celu stworzenie wykresów, czy to liniowych czy słupkowych,
            dzięki niej można w łatwy sposób tworzyć zróżnicowane wykresy.
            </p>
            </a>
        </div>
   </article>

     <article>
        <div class="content">
        <a href="paper.php">
        <div class="logo"><img src="images/paper.png"></div>
        <h2>Paper.js</h2>
        <p>
          Lekka biblioteka, ułatwiająca działanie na elemencie Canvas. Oferuje funkcjonalność wspomagającą pracę na grafice wektorowej i krzywych Beziera. Największym atutem tej biblioteki jest jej model obiektowy.
        </p>
        </a>
        </div>
   </article>

     <article>
       <div class="content">
       <a href="angular.php">
        <div class="logo"><img src="images/angular2.png"></div>
        <h2>Angular Framework</h2>
        <p>
           Nie jest to biblioteka, lecz Framework. Jednak pełni on taką samą funkcję jak biblioteka, rozszerza możliwości programisty. Angular oparty jest o Typescript, stosowany przy większych projektach, z powodu jego wielkości. Przystosowany do pracy w grupie.

        </p>
        </a>
       </div>
   </article>  
   <article>
     <div class="content">
     <a href="p5.php">
      <div class="logo"><img src="images/p5.png"></div>
      <h2>P5.JS</h2>
      <p>
       Biblioteka stosowana przy projektach opartych wyłącznie o Canvas. Jest to dość ciężka biblioteka i stosowanie jej jako dodatek nie ma większego sensu. Częstym jej zastosowaniem jest tworzenie gier opartych na płutnie HTML5.
      </p>
      </a>
     </div>
   </article>



</main>

<footer id="foo" class="footm">
<p>&copy; Wszystkie prawa zastrzeżone.</p>
<p id="blink">Kontakt: jan.fiolka44@gmail.com</p>



</footer>



<script src="scripts/menu_script.js"></script>
</body>
</html>