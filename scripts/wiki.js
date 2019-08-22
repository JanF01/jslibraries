$(document).ready(function(){
    var obj =
    {
      pages: [],
      content:[],
      links:[],
    };

    //Event przy kliknięciu przycisku
      $(".btn").on("click", function(){
      //Opróżnienie poprzednich wyników wyszukiwania   
        $("#results").empty();
       
         var value = $("#pole").val(); // Zapisanie wpisanego przez użytkownika słów
         var url ='https://en.wikipedia.org/w/api.php?action=opensearch&search='+ value + '&format=json&callback=?';
         // AJAX wysyłający zapytanie do API wikipedii
           $.ajax({
              type:"GET",
              url:url,
              async:false,
             dataType:"json",
             success:function(data){
             
               console.log(value);
               
               for(var i=0;i<data[1].length;i++)
                 {
                   obj.pages.push(data[1][i]);
                   obj.content.push(data[2][i]);
                   obj.links.push(data[3][i]);
                   
                   
                   
                   
                 }
          // Stworzenie listy ul w elemencie results 
              $("#results").prepend("<ul></ul>");

               for(var y=obj.pages.length-1;y>=0;y--)
                 {
                  // Zapełnienie listy elementami
                   $("#results ul").prepend("<a target='_blank' href="+obj.links[y]+"><li><h1>" +obj.pages[y] + "</h1><p>" + obj.content[y]+ "</p></li></a>");
                   
                   
                   
                 }
               obj.pages.splice(0,obj.pages.length);
               obj.content.splice(0,obj.content.length);
               obj.links.splice(0,obj.links.length);
             
               
             },
             error: function(error){
               
               alert("Somethink gone wrong");
               
               
               
             }
             
           });
        
      });
      
    });