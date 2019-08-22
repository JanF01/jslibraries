<!DOCTYPE html>
<html>
<head lang="pl">
 
    <meta charset="utf-8">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="styles/lib_head.css">
    <link rel="stylesheet" href="styles/libraries.css">
    <link rel="stylesheet" href="styles/wiki.css">


    <script type="text/paperscript" src="scripts/sketch.js" canvas="cnv"></script>
</head>
<body>


<?php

include "./head.php";

?>

<p class="lib">JQuery</p>

<section class="text">
<p>Biblioteka umożliwiająca uwydajnienie kodowania, upraszcza wiele niepotrzebnie skomplikowanych operacji, takich jak manipulowanie elementami DOM, obsługę eventów, wysyłanie zapytań AJAX, czy tworzenie animacji.
Głównym celem zastosowania JQuery jest oszczędność czasu i ograniczenie długości kodu do minimum. Często jest biblioteką, po którą sięga się jako pierwszą odrazu po wdrożeniu się w język JavaScript.
Bywają przypadki kiedy to najpierw sięga się po JQuery, a dopiero później powraca się do Vanilla Javascript, by poznać język głębiej.
 </p>

</section>


<section class="dom">
<p class="subtitle">Manipulowanie elementami DOM</p>
    <p class="w">Bez biblioteki</p>   
    <p class="w">Z biblioteką</p> 
<div class="vanilla">

<img src="images/van1.png">
<img src="images/van2.png">
</div>
<p class="wm">Z biblioteką</p>  
<div class="jq">

<img src="images/jq1.png">
<img src="images/jq2.png">
</div>
</section>




<section class="events">
<p class="subtitle">Setup eventów </p>

<p class="w">Bez biblioteki</p>  
<p class="w">Z biblioteką</p>  

<div class="vanilla">


<img src="images/van3.png">
<img src="images/van4.png">
</div>
<p class="wm">Z biblioteką</p>  
<div class="jq">

<img src="images/jq3.png">
<img src="images/jq4.png">
</div>
<div class="col">Najedź na mnie</div>
</section>

<section class="ajax">
<p class="subtitle">Przykładowy AJAX </p>

<p class="w">Bez biblioteki</p>  
<p class="w">Z biblioteką</p>  

<div class="vanilla">


<img src="images/van6.png">

</div>
<p class="wm">Z biblioteką</p>  
<div class="jq">

<img src="images/jq6.png">

</div>
<p class="a" style="width:80%;margin-left:7%;text-align:center;">AJAX stosowany do wysyłania asynchronicznych zapytań HTTP. W tym przypadku wysyłamy za pomocą PHP zapytanie do bazy danych o aktualizację opisu.</p>
</section>

<section class="animations">
<p class="subtitle">Animacje</p>

<p class="w">Bez biblioteki</p>  
<p class="w">Z biblioteką</p>  

<div class="vanilla">


<img src="images/van7.png">

</div>
<p class="wm">Z biblioteką</p>  
<div class="jq">

<img src="images/jq7.png">

</div>
<div id="startAnimation">Kliknij mnie</div>
</section>


<div id="container">
  <div id="title">Wikipedia Viewer</div>
  <div id="random">
    
    <a href="https://en.wikipedia.org/wiki/Special:Random" target="_blank">Click here to search for random Article</a>
    
  </div>
  <div id="in">
    
    <form name="form">
      
      <input type="text" id="pole">
      
    </form>
</div>
     
          
        <button type="button" class="btn btn-primary">Search</button>
        
   
      <div id="results">
        
      
        
        
        
      </div>
         
 
</div>

<div class="wikiCode">
<p class="codepen" data-height="568" data-theme-id="0" data-default-tab="js" data-user="KiritoKirigaya" data-slug-hash="dvooVO" style="height: 568px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid black; margin: 1em 0; padding: 1em;" data-pen-title="dvooVO">
  <span>See the Pen <a href="https://codepen.io/KiritoKirigaya/pen/dvooVO/">
  dvooVO</a> by Jan Fiołka (<a href="https://codepen.io/KiritoKirigaya">@KiritoKirigaya</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://static.codepen.io/assets/embed/ei.js"></script>
</div>



<footer id="foo">
<p>&copy; Wszystkie prawa zastrzeżone.</p>
<p id="blink">Kontakt: jan.fiolka44@gmail.com</p>

</footer>



<script src="scripts/menu_script.js"></script>
<script src="libraries/jquery.js"></script>
<script src="scripts/examples.js"></script>
<script src="scripts/wiki.js"></script>
</body>
</html>