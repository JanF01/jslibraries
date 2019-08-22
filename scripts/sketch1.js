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
