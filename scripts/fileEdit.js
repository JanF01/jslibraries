
   var edytowanyObraz;
   var ustawiony = false;
     
     // Jako Raster przechowujemy zawartość elementu img, do którego zrzucany jest obraz
     edytowanyObraz = new paper.Raster('toEditing');
     edytowanyObraz.position.x = 0;
     edytowanyObraz.position.y = 0;
      
    // Ustawnie obrazu do edycji przy kliknięciu w niego 
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
      
      // Dodatkowe ustawnienie elementu przechowującego Canvas, zależnie od wielkości zdjęcia.  
        document.getElementsByClassName('editing')[0].style.height = "calc(19em + " + edytowanyObraz.height + 'px)';
      
      // Zmiana flagi  
        ustawiony=true;
    }
        }

      // Event przy przeciąganiu myszy po Obrazie  
        edytowanyObraz.onMouseDrag = function(e){

     // Pętla wykonuje się dla 4px w lego i w prawo od miejsca przeciągania
       for(var i=-4;i<4;i++){
           for(var l=-4;l<4;l++){
       // Przechowujemy nasycenie danego koloru w danym pixelu. minimum to 0. maximum to 1.
         var red =  edytowanyObraz.getPixel(new Point(e.point.x+i,e.point.y+l)).red;
         var green =  edytowanyObraz.getPixel(new Point(e.point.x+i,e.point.y+l)).green;
         var blue =  edytowanyObraz.getPixel(new Point(e.point.x+i,e.point.y+l)).blue;

       // Przyciemniamy pixel, przyczym nasycenie zielonego koloru zmniejsza się wolniej.  
            edytowanyObraz.setPixel(new Point(e.point.x+i,e.point.y+l), new Color(red*=0.972,green*=0.994,blue*=0.972));
        

        }
       }
    }






