<!DOCTYPE html>
<html>
<head lang="pl">
 
    <meta charset="utf-8">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="styles/lib_head.css">
    <link rel="stylesheet" href="styles/libraries.css">
    <link rel="stylesheet" href="styles/prism.css"/>

    <script src="./paper-full.min.js"></script>

    <script type="text/paperscript" src="scripts/sketch1.js" canvas="cnv1"></script>
    <script type="text/paperscript" src="scripts/fileEdit.js" canvas="cnv2"></script>
</head>
<body>


<?php

include "./head.php";

?>

<p class="lib">Paper.js</p>

<section class="textp">
<p>
Jedna z wielu bibliotek wspomagających działanie na elemencie Canvas, wszystko co wykracza poza możliwości GIFA tworzone jest na tym elemencie, np. interaktywne animacje czy
edytory zdjęć. Paper.js to relatywnie lekka biblioteka, nie jest przeznaczona do tworzenia rozbudowanych gier, a także nie ma optymalizacji na wysokim poziomie, można to zauważyć przy
wyświetlaniu większych ilości elementów, przy aplikacjach FPS.

 </p>

</section>

<section class="drawing">
<p class="subtitle">Rysowanie</p>
<canvas id="cnv1" resize></canvas>
</section>

<section class="code" style="top:92em;font-size:0.9em;">
 <pre>
     <code class="language-javascript">
tool.minDistance = 5;   // Minimalna prędkość rysowania
tool.maxDistance = 40;   // Maksymalna prędkość rysowania

var type = "farba";   // Przechowujemy typ narzędzia
var path;   // Przechowujemy ścieżkę

var pencil = new Raster('pencil');   // PNG ołowka ( Raster )
var pendzel = new Raster('pendzel');   // PNG pędzla

pencil.scale(0.1);   // Zeskalowanie Rastra
pencil.position.x = view.viewSize.width*0.05;   // Ustawienie pozysji Rastra na 5% szerokości canvasu
pencil.position.y = 60;

pendzel.scale(0.08);
pendzel.position.x = view.viewSize.width*0.05;
pendzel.position.y = 160;

// Eventy przy kliknięciu rastrów
pencil.onClick = function(e){
    type="olowek";
}
pendzel.onClick = function(e){
    type="farba";
}

// Event przy wciśnięciu myszki
function onMouseDown(e){
    path = new Path(); // Utworzenie obiektu ścieżki

    if(type=="farba"){
        path.fillColor = {
            hue: Math.random() * 360, // barwa koloru
            saturation: 0.95, // nasycenie koloru
            brightness: 0.7 // jasność koloru
        };
    }
    else{
        var r = Math.random() * 140;
        var g = Math.random() * 100;
        var b = Math.random() * 180;
        path.strokeColor = 'rgb(' + r + ',' + g + ',' + b;
    }

    path.add(e.point); // Początek ścieżki w miejscu wciśnięcia myszy;

}
// Event przy przeciągnięciu myszy
function onMouseDrag(e){

    var step = e.delta/2; // przypisanie prędkości przesunięcia myszą
    step.angle += 90; // obrót wektora o 90 stopni

    var top = e.middlePoint + step; // stworzenie punktów, których odległoś zależna jest od prędkości
    var bottom = e.middlePoint - step;

    if(type=="farba"){
        // dodanie punktów do ścieżki, oraz wygładzenie kątów    
        path.add(top);
        path.insert(0,bottom);
        path.smooth();
    }
    else{
        // Przy ołówku wystarczy dodanie 1 punktu    
        path.add(e.point);
        path.smooth();
    }
}

// Event przy puszczeniu przycisku myszki
function onMouseUp(e){
    if(type=="farba"){
        //dodanie punktu łączącego wszystko i zamknięcie ścieżki       
        path.add(e.point);
        path.closed = true;
        path.smooth();
    }
}

</code>
</pre>
</section>

<section class="editing">
<p class="subtitle">Edycja obrazów</p>
<form dropzone="copy" id="dropzone">Przeciągnij obraz tutaj</form>
<div class="cab">
<canvas id="cnv2" resize></canvas>
</div>
<p style="width:100%;text-align:center;">Najpierw kliknij zdjęcie, aby ustawić je do edycji. Zmień kolor swoich włosów lub oczu przez ciągnięce myszką po zdjęciu, następnie pobierz zdjęcie poniżej</p>
<button onClick="pobierz()">Pobierz obraz</button>
<a id="pobranie" download="plikObraz.png" style="display:none;"></a>
</section>


<section class="code" style="top:264em;font-size:0.9em;">
<p class="subtitle" style="margin-bottom:-0.5em;">System Dropzone</p>
 <pre>
     <code class="language-javascript">
     
// Przechowanie elementu, na który zrzucamy obraz
var dropzone = document.getElementById('dropzone');

// Zatrzymanie domyślnego eventu
dropzone.addEventListener('dragover',function(e){
    e.stopPropagation();
    e.preventDefault();
});


// Event zrzucenia obrazu
dropzone.addEventListener('drop',function(e){
    // Zatrzymanie domyslnego zachowania i propagacji do elementów nadrzędnych
      e.preventDefault();
      e.stopPropagation();
  
    // Przechowaniu zrzuconego zdjęcia, oraz stworzenie obiektu FileReader.
    var plik = e.dataTransfer.files[0];
    var reader = new FileReader();

    // reader przechowuje URL zdjęcia
    reader.readAsDataURL(plik);

    // Czekamy na załadowanie zdjęcia
    reader.onload = function(e){

       // Zmieniamy żródło elementu img ukrytego na stronie na URL obrazu
       document.getElementById('toEditing').src = e.target.result;

    }
    
});

function pobierz() {
    // Stworzenie linku do pobrania zawartości elementu Canvas jako image/png
    var download = document.getElementById("pobranie");
    var image = document.getElementById("cnv2").toDataURL("image/png")
        .replace("image/png", "image/octet-stream");
    download.setAttribute("href", image);
    
    // Wywołanie kliknięcia na linku
    download.click();
}
</code>
</pre>
</section>

<section class="code" style="top:339em;font-size:0.9em;">
<p class="subtitle" style="margin-bottom:-0.5em;">Edytowanie Obrazu</p>
 <pre>
     <code class="language-javascript">

   var edytowanyObraz;
   var ustawiony = false;
     
     // Jako Raster przechowujemy zawartość elementu img, do którego zrzucany jest obraz
     edytowanyObraz = new paper.Raster('toEditing');
     edytowanyObraz.position.x = 0;
     edytowanyObraz.position.y = 0;
      
    // Ustawienie obrazu do edycji przy kliknięciu w niego 
     edytowanyObraz.onMouseDown = function(e){  
    // Sprawdzamy czy nie został już ustawiony      
    if(!ustawiony){
     
      // Ustawiamy odpowiednio szerokość i wysokość Canvasu oraz jego view, aby pasowały do wielkości obrazu.  
        document.getElementById('cnv2').style.width = edytowanyObraz.width + 'px';
        document.getElementById('cnv2').style.height = edytowanyObraz.height + 'px';
        document.getElementById('cnv2').style.marginLeft = "calc(50% - " + edytowanyObraz.width/2 + 'px)';
        view.viewSize.width = edytowanyObraz.width;
        view.viewSize.height = edytowanyObraz.height;

      // Zmieniamy pozycję obrazu, aby jego róg był w górnym lewym rogu Canvasu  
        edytowanyObraz.position.x = edytowanyObraz.width/2;
        edytowanyObraz.position.y = edytowanyObraz.height/2;
      
      // Dodatkowe ustawienie elementu przechowującego Canvas, zależnie od wielkości zdjęcia.  
        document.getElementsByClassName('editing')[0].style.height = "calc(19em + " + edytowanyObraz.height + 'px)';
      
      // Zmiana flagi  
        ustawiony=true;
    }
        }

      // Event przy przeciąganiu myszy po Obrazie  
        edytowanyObraz.onMouseDrag = function(e){

     // Pętla wykonuje się dla 4px w lewo i w prawo od miejsca przeciągania
       for(var i=-4;i&lt;4;i++){
           for(var l=-4;l&lt;4;l++){
       // Przechowujemy nasycenie danego koloru w danym pixelu. minimum to 0. maximum to 1.
         var red =  edytowanyObraz.getPixel(new Point(e.point.x+i,e.point.y+l)).red;
         var green =  edytowanyObraz.getPixel(new Point(e.point.x+i,e.point.y+l)).green;
         var blue =  edytowanyObraz.getPixel(new Point(e.point.x+i,e.point.y+l)).blue;

       // Przyciemniamy pixel, przyczym nasycenie zielonego koloru zmniejsza się wolniej.  
            edytowanyObraz.setPixel(new Point(e.point.x+i,e.point.y+l), new Color(red*=0.972,green*=0.994,blue*=0.972));
        

        }
       }
    }

</code>
</pre>
</section>

<footer id="foo" class="downf">
<p>&copy; Wszystkie prawa zastrzeżone.</p>
<p id="blink">Kontakt: jan.fiolka44@gmail.com</p>

</footer>

<img id="pencil" src="images/pencil.png" style="display:none;">
<img id="pendzel" src="images/pendzel.png" style="display:none;">
<img id="toEditing" style="display:none;">

<script src="scripts/menu_script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.5.0/prism.min.js"></script>
<script src="scripts/sketch2.js"></script>
</body>
</html>