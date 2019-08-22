
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
    if(screen.width<1000) createCanvas(700,600);
    else createCanvas(screen.width-200,840);

    // Tworzymy element DOM ( slider )
    slider = createSlider(4,70,18);

    // Ustawiamy pozycję slidera na stronie
    slider.position(screen.width/2-(screen.width*0.8)/2,screen.height/1.35);

    // Ustawiamy max FPS
    frameRate(60);

    // Tworzymy 10 Piłek ( struktura klasy Ball poniżej )
    for(let i=0;i<10;i++){
       let b = new Ball(width/2,balls.length,slider.value());
       // Dodajemy piłkę do tablicy 
       balls.push(b);  
    }

    // Ustawiamy kolor i obramowanie piłek
    fill(40,170,40);
    noStroke();

}

// Funkcja draw wykonywana 60 razy na sekundę przy 60 FPS
function draw(){
     // Zamalowanie całego Canvasu
    background(56);

    // Stworzenie wektora grawitacji i wiatru, który dodamy do piłek
    v = createVector(wind,gravity);

    for(let i=0;i<balls.length;i++){
     // Wywołanie poszczególnych metod dla wszystkich piłek
       balls[i].edges();
       balls[i].make();
       balls[i].update();
       balls[i].applyForce(v);
    }

   // Jeśli wciśnięta jest myszka tworzymy piłki
    if(mouseIsPressed){
        // Sprawdzamy czy klikamy na Canvasie, oraz ustawiamy limit piłek
        if(balls.length<520 && mouseX>0 && mouseX<canvas.width && mouseY>0 && mouseY<canvas.height){
            let b = new Ball(mouseX,balls.length,slider.value());
            balls.push(b); 
        }   
    }
    
    // Jeśli A lub D nie jest wciśnięte, zmniejszamy powoli siłę wiatru
    if(wind<0 && !keyIsPressed) wind+=0.03;
    if(wind>0 && !keyIsPressed) wind-=0.03;
    if(abs(wind)<0.06)wind=0;
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
        if(this.loc.x<0){
             this.loc.x = 0;
             this.vel.x = -this.vel.x;
         }
        if(this.loc.y<space){
             this.loc.y = space;
             this.vel.y = -this.vel.y;
         }
        if(this.loc.y>height-space){
             this.loc.y = height-space;
             this.vel.y = -this.vel.y;
         }
       
        // Pętla wykonuje się dla każdej piłki
        for(let i=this.i;i<balls.length;i++){
        
            /* Sprawdzamy czy odległość piłki od drugiej nie jest mniejsza od sumy połowy wielkości piłek
            + ich prędkość w danym momencie, nie jest to optymalny algorytm zderzenia */
              if(abs(this.loc.x-balls[i].loc.x)<(space+balls[i].size/2)+this.vel.mag()+balls[i].vel.mag() 
            && abs(this.loc.y-balls[i].loc.y)<(space+balls[i].size/2)+this.vel.mag()+balls[i].vel.mag()){
            
                /* Jeśli piłka jest w odpowiedniej odległości, sprawdzamy jak dokładnie daleko się znajduje,
                    
                    */
                let xoff = this.loc.x-balls[i].loc.x;

                // Zależnie od odległości, wiemy, w którą stronę ma się odbić
                if(xoff>0)xoff=0.3;
                else if(xoff<0)xoff=-0.3;
                else xoff = 0;
            
                let yoff = this.loc.y-balls[i].loc.y;

                if(yoff>0) yoff=0.7;
                else if(yoff<0) yoff=-0.7;
                else yoff=0;

                // Tworzymy wektor
                let vector = createVector(xoff,yoff);
                
                // Dodajemy wektor do przyśpieszenia
                this.acc.add(vector);
        } 
         
    }
   } 
  
}

  