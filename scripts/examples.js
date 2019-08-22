$(document).ready(function(){

$('.col').on('mouseover',function(){
    
   $(this).css('opacity','1');
   $(this).css('animation', 'to 1s 6');
    
});

$('#startAnimation').on('click',function(){
    
    $(this).animate({
           width: '70%'
      },200).animate({
     bottom: '1em'
      },200).animate({
        height: '3.5em'
      },{
          duration: 300,
          complete: function(){
            $(this).css('background', '#006633');
            $(this).html(`JQuery jest bardziej intuicyjne,
             a także upiększa animację 'under the hood'`);
          }
      });
    
});






});

var startAnim = document.getElementById('startAnimation');

startAnim.addEventListener('click', function(){

    this.style.transition = "0.2s";

    this.style.width = "70%";
    setTimeout(()=>{
        this.style.bottom = "1em";
    },200);
    setTimeout(()=>{
        this.style.height = "3.5em";
        this.style.transition = "0.3s";
    },400);
    setTimeout(()=>{
        this.style.background = "#006633";
        this.innerHTML = `JQuery jest bardziej intuicyjne,
              a także upiększa animację 'under the hood'`;
    },700);
    
});