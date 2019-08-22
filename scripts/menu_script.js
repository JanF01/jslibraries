

function checkScrollPos(){

    let height = window.scrollY;

    if(height>100){
       var navigation = document.getElementsByTagName('nav')[0];
       var header = document.getElementsByTagName('header')[0];

       navigation.style.width = "100%";
       navigation.style.top = "0";
       navigation.style.left = "0";
       navigation.style.borderRadius = "0";
       header.style.top = "-2em";
    }
   else if(height<100){
    var navigation = document.getElementsByTagName('nav')[0];
    var header = document.getElementsByTagName('header')[0];

    navigation.style.width = "94%";
    navigation.style.top = "3em";
    navigation.style.left = "3%";
    navigation.style.borderRadius = "0.3em";
    header.style.top = "0";
   }

  

}

window.addEventListener("scroll",()=>{
    if(window.innerWidth>800)
    checkScrollPos();
  
 });



window.onload = function(){
    if(window.innerWidth>800)
    checkScrollPos();


}

document.getElementById("libNav").addEventListener("mouseover",()=>{
    
    document.getElementById("libList").style.display = "block";
    
    
});

document.getElementById("libNav").addEventListener("mouseout",()=>{
    
    document.getElementById("libList").style.display = "none";
    document.getElementById("libNav").style.background = "black";
    
});
document.getElementsByClassName('mobile')[0].addEventListener('click',()=>{
    
    document.getElementsByTagName('ul')[0].style.display="flex";
    
    
    
});
document.getElementsByTagName('ul')[0].addEventListener('mouseleave',()=>{
    if(window.innerWidth<800)
    document.getElementsByTagName('ul')[0].style.display="none";
    
    
    
});

var blink = function(){

     let p = document.getElementById('blink');

     p.style.transition = "0.5s";
     p.style.color = "#FFF";
     p.style.transform = "scale(1.05)";
     setTimeout(function(){
     p.style.color = "#777";
     p.style.transform = "scale(1)";
     },500);

}

function kontakt(){
    setInterval(blink,1000);

}





