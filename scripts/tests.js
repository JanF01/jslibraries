

var x = 600;
var y = 111;

function startingPoint(){
     x*=1.5;
     y*=1.6;  
}


startingPoint();


function nextAnimation(color,html){
     var label = document.getElementById('nextAnimation');

     label.style.background = color;
     label.style.paddingLeft = '2em';
     label.style.paddingRight = '2em';

     label.innerHTML = html;
     setTimeout(()=>{

        label.style.paddingTop = '0.7em';
        label.style.paddingBottom = '0.7em';
 
      },175);
     setTimeout(()=>{
       label.style.paddingLeft = '10em';
       label.style.paddingRight = '10em';

     },250);
     setTimeout(()=>{
        label.style.paddingTop = '1.1em';
        label.style.paddingBottom = '1.1em';
     
      },425);



}




var log = [];          
 
document.addEventListener("keydown", function(e){
    switch(e.keyCode){
     case 65:{
      nextAnimation('#108241','Kliknij literę H na swojej klawiaturze');
       break;
     }
     case 72:{   
        nextAnimation('#003491','Kliknij literę O na swojej klawiaturze');
      break;
    }
    case 79:{     
        nextAnimation('#307421','Kliknij numer 4 na swojej klawiaturze');
      break;
    }
    case 52:{      
        nextAnimation('#886401','Kliknij literę A na swojej klawiaturze');
    break;
    }
    }
  log.push(e.keyCode);
  if(log.length<100)
  document.getElementById('log').innerHTML += String.fromCharCode(log[log.length-1]);
},false);


    QUnit.test("Postawowy test equal",function( assert ){
        assert.equal(x, 900, "Zakładam, że x jest równe 900");
        assert.equal(y, 177.6, "Zakładam, że y jest równe 177,6");
    });





