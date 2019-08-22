



var circle,counter=0;


function draw(){

  

    circle = new Path.Circle(Math.random()*cnv.width,Math.random()*(cnv.height-20)+20,30);


    switch(Math.floor(Math.random()*3)){

      case 0:{
    circle.strokeColor = '#605';
     break;
      }
      case 1:{
      circle.strokeColor = '#065';
        break;
      }
      case 2:{
        circle.strokeColor = '#336';
          break;
        }


    }
   

    for(var i=0;i<25;i++){
      var clone = circle.clone();
      clone.rotate((360/25)*i,circle.bounds.topLeft);
    }

    counter++;



    }


    function onMouseMove(event){

      if(counter<=30){
   if(window.innerWidth>1300){
      myGumka = new Path.Circle({
        center: event.point,
        radius:90
     });
  
    myGumka.fillColor = 'black';
    }

    event.stop();
    
    }
    else{
    project.activeLayer.removeChildren();
    counter=0;
    }
    }



var inter = setInterval(draw,800);