<!DOCTYPE html>
<html>
<head lang="pl">
 
    <meta charset="utf-8">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="styles/lib_head.css">
    <link rel="stylesheet" href="styles/libraries.css">
    <link rel="stylesheet" href="styles/prism.css"/>
    
    <style>
 canvas:nth-of-type(1){
       position:absolute;
       top:46em;
       margin-left:5%;
   }

    </style>

    <script type="text/paperscript" src="scripts/sketch.js" canvas="cnv"></script>
</head>
<body>


<?php

include "./head.php";

?>

<p class="lib">P5.js</p>
<section class="textc">
<p>
 Celem twórców P5.js było stworzenie czegoś co używane będzie jako kompletny zestaw do stworzenia aplikacji opartej na Canvasie. p5.js to nie jedyny ich produkt. Processing oparte o Jave i Processing na Androida to ich główne projekty. Główną aspiracją jest stworzenie 
 prostego do nauczenia i użytkowania narzędzia. Za pomocą tej biblioteki można tworzyć zaawansowane animacje, symulacje czy gry. 
 Optymalizacja jest na dobrym poziomie, ale oczywiście dużo zależy od umiejętności programisty. 
 </p>

</section>


<section class="vectors">
<p class="subtitle">Podstawy oraz Wektory</p>
<p style="width:100%;text-align:center;margin-top:0.5em;font-weight:bold;">Dodawaj kulki przez wciśnięcie myszy. Zmieniaj rozmiar kulek suwakiem. Przytrzymaj A lub D aby wywołać wiatr.</p>

</section>

<section class="code" style="top:115em;font-size:0.9em;">
<p class="subtitle" style="margin-bottom:-0.5em;">Setup</p>
 <pre>
     <code class="language-javascript">
// Tablica, w której będziemy przechowywać piłki
var balls = [];

// Zmienne na wektory
var wind = 0;
var gravity =0.8;
var v;

var slider;

// Funkcja wywoływana przez p5.js automatycznie po funkcji preload ( W tym przypdaku nie używamy funkcji preload )
function setup(){
    // Tworzymy Canvas ustawiając odpowiedni rozmiar 
    if(screen.width&lt;1000) createCanvas(700,600);
    else createCanvas(screen.width-200,840);

    // Tworzymy element DOM ( slider )
    slider = createSlider(4,70,18);
    
    // Ustawiamy pozycję slidera na stronie
    slider.position(screen.width/2-(screen.width*0.8)/2,screen.height/1.35);

    // Ustawiamy max FPS
    frameRate(60);

    // Tworzymy 10 Piłek ( struktura klasy Ball poniżej )
    for(let i=0;i&lt;10;i++){
       let b = new Ball(width/2,balls.length,slider.value());
       // Dodajemy piłkę do tablicy 
       balls.push(b);  
    }

    // Ustawiamy kolor i brak obramowania
    fill(40,170,40);
    noStroke();

}
</code>
</pre>
</section>

<section class="code" style="top:181em;font-size:0.9em;">
<p class="subtitle" style="margin-bottom:-0.5em;">Draw</p>
 <pre>
     <code class="language-javascript">
// Funkcja draw wykonywana 60 razy na sekundę przy 60 FPS
function draw(){
     // Zamalowanie całego Canvasu
    background(56);

    // Stworzenie wektora grawitacji i wiatru, który dodamy do piłek
    v = createVector(wind,gravity);

    for(let i=0;i&lt;balls.length;i++){
     // Wywołanie poszczególnych metod dla wszystkich piłek
       balls[i].edges();
       balls[i].make();
       balls[i].update();
       balls[i].applyForce(v);
    }

   // Jeśli wciśnięta jest myszka tworzymy piłki
    if(mouseIsPressed){
        // Sprawdzamy czy klikamy na Canvasie, oraz ustawiamy limit piłek
        if(balls.length&lt;520 && mouseX&gt;0 && mouseX&lt;canvas.width && mouseY&gt;0 && mouseY&lt;canvas.height){
            let b = new Ball(mouseX,balls.length,slider.value());
            balls.push(b); 
        }   
    }
    
    // Jeśli A lub D nie jest wciśnięte, zmniejszamy powoli siłę wiatru
    if(wind&lt;0 && !keyIsPressed) wind+=0.03;
    if(wind&gt;0 && !keyIsPressed) wind-=0.03;
    if(abs(wind)&lt;0.06)wind=0;
}

function keyPressed(){
// Ustawienie siły wiatru, kiedy A lub D jest wciśnięte
  if(keyCode==65){
    wind=-0.3;
  }   
  else if(keyCode==68){
    wind=0.3;
  }
}
</code>
</pre>
</section>


<section class="code" style="top:251em;font-size:0.9em;">
<p class="subtitle" style="margin-bottom:-0.5em;">Klasa Ball</p>
 <pre>
     <code class="language-javascript">
class Ball{
 
  constructor(m,n,s){
    
     // wektor lokalizacji
     this.loc = createVector(random(m-100,m+100),random(200));

     // wektor prędkości
     this.vel = createVector();

     // wektor przyśpieszenia
     this.acc = createVector();

     this.size = s;
     // index w tablicy
     this.i = n;

  }
 update(){

    // Dodajemy wektor przyśpieszenia do wektora prędkości   
     this.vel.add(this.acc);

    // Dodajemy wektor prędkości do wektora lokalizacji
    this.loc.add(this.vel);
    
    // zmniejszamy wektor prędkości ( opór powietrza [powinien być wektorem przy realistycznej symulacji] )
      this.vel.mult(0.98);

    // zerujemy wektor przyśpieszenia
    this.acc.mult(0);
 }

  make(){
        // narysowanie piłki w jej lokalizacji  
        ellipse(this.loc.x,this.loc.y,this.size,this.size);
  } 

  applyForce(force){
      // dodanie wektora grawitacji i wiatru do wektora przyśpieszenia   
      this.acc.add(force);
  }
  edges(){
        let space = this.size/2;

        // Sprawdzanie uderzenia w ściany
        if(this.loc.x>width){
             this.loc.x = width;
             this.vel.x = -this.vel.x;
         }
        if(this.loc.x&lt;0){
             this.loc.x = 0;
             this.vel.x = -this.vel.x;
         }
        if(this.loc.y&lt;space){
             this.loc.y = space;
             this.vel.y = -this.vel.y;
         }
        if(this.loc.y>height-space){
             this.loc.y = height-space;
             this.vel.y = -this.vel.y;
         }
       
        // Pętla wykonuje się dla każdej piłki
        for(let i=this.i;i&lt;balls.length;i++){
        
            /* Sprawdzamy czy odległość piłki od drugiej nie jest mniejsza od sumy połowy wielkości piłek
            + ich prędkość w danym momencie, nie jest to optymalny algorytm zderzenia */
              if(abs(this.loc.x-balls[i].loc.x)<(space+balls[i].size/2)+this.vel.mag()+balls[i].vel.mag() 
            && abs(this.loc.y-balls[i].loc.y)<(space+balls[i].size/2)+this.vel.mag()+balls[i].vel.mag()){
            
                /* Jeśli piłka jest w odpowiedniej odległości, sprawdzamy jak dokładnie daleko się znajduje,
                    
                    */
                let xoff = this.loc.x-balls[i].loc.x;

                // Zależnie od odległości, wiemy, w którą stronę ma się odbić
                if(xoff>0)xoff=0.3;
                else if(xoff&lt;0)xoff=-0.3;
                else xoff = 0;
            
                let yoff = this.loc.y-balls[i].loc.y;

                if(yoff>0) yoff=0.7;
                else if(yoff&lt;0) yoff=-0.7;
                else yoff=0;

                // Tworzymy wektor
                let vector = createVector(xoff,yoff);
                
                // Dodajemy wektor do przyśpieszenia
                this.acc.add(vector);
        } 
         
    }
   } 
  
}
</code>
</pre>
</section>


<section class="forty c">
<p class="subtitle">Clicker</p>
<a href="https://janf01.github.io/Ddots/" target="_blank"><img src="images/dots.png"></a>

</section>

<section class="forty m">
<p class="subtitle">Matrix</p>
<a href="https://janf01.github.io/Matrix/" target="_blank"><img src="images/matrix.png"></a>
</section>

<footer id="foo" class="p5f">
<p>&copy; Wszystkie prawa zastrzeżone.</p>
<p id="blink">Kontakt: jan.fiolka44@gmail.com</p>

</footer>



<script src="scripts/menu_script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/p5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.5.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/addons/p5.dom.js"></script>
<script src="scripts/p5_1.js"></script>
</body>
</html>