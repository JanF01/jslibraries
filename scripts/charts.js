



new Chart(document.getElementById('bar-chart'),{
    type: 'bar',
    data: {
        labels: ['Niemcy','Francja','Włochy','Hiszpania','Holandia','Polska','Szwecja','Austria','Czechy','Grecja'],
        datasets:[
          {
          label: "Spędzone noce (miliony)",
          backgroundColor: ['#900040','#3030F0','#109910',"#999910","#4090FF","#FF0F30","#8000A0","#307020","#00A0F0","#0000ff"],
          data: [318,299,210,165,68,67,44,35,27,22],

          }
        ]
    },
   options: {
     legend: {display:false},
     title: {
     display:true,
     text: "Liczba nocy spędzonych w rezydencjach turystycznych",
     fontColor: 'black',
     padding:20,
     fontFamily:'Montserrat',
     fontSize:18
     }
   }
});


new Chart(document.getElementById('line-chart'),{
    type: 'line',
    data: {
    labels: ['2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017','2018'],
    datasets:[
        {
           label: "Niemcy", 
           backgroundColor:'#900040',
           data: [31000,32100,32500,30800,32100,33300,33400,33500,34100,34400,34900,35500,35900],
           borderColor: '#900040',
           fill: false
        },
        {
           label: "Grecja",
           backgroundColor:'#3070AA',
           data: [22000,22700,22600,21500,20300,18500,17200,16800,17000,17100,17100,17400,17800],
           borderColor: '#3070AA',
           fill: false
        },
        {
           label: "Polska", 
           backgroundColor:'#CC2020',         
           data: [8000,8500,8900,9100,9400,9900,10000,10200,10500,10900,11300,11800,12400],
           borderColor: '#CC2020',
           fill: false
        },
        {
           label: "Romania",
           backgroundColor:'#AA5500',
           data: [5600,6100,6700,6400,6200,6300,6500,6800,7000,7300,7700,8300,8700],
           borderColor: '#AA5500',
           fill: false
        },
    ]
   },
   options: {
     title: {
     display:true,
     text: "Produkt Krajowy Brutto 2006-2018",
     fontColor: 'black',
     padding:10,
     fontFamily:'Montserrat',
     fontSize:18
     }
   }
});

new Chart(document.getElementById('doughnut-chart'),{
  type: 'doughnut',
  data: {
      labels: ['Niemcy','UK','Polska','Włochy','Francja','Hiszpania','Holondia','Czechy','Belgia','Reszta'],
      datasets:[
        {
        label: "Emisja CO2 w kilotonach (miliony)",
        backgroundColor: ['#900040','#3030F0',"#FF0F30",'#109910',"#4090FF","#999910","#8000A0","#307020","#00A0F0","#0000ff"],
        borderColor: "#F1F1F1",
        data: [664,299,289,258,234,216,149,83,72,704]
        }
      ]
  },
 options: {
   title: {
   display:true,
   text: "Emisja CO2 w krajach Unii Europejskiej 2017",
   fontColor: 'black',
   padding:20,
   fontFamily:'Montserrat',
   fontSize:18
   }
 }
});

new Chart(document.getElementById('radar-chart'),{
  type: 'radar',
  data: {
      labels: ['Żywność, napoje bezalkocholowe i alkoholowe',
      'Odzież i obuwie','Mieszkanie','Zdrowie','Transport i łączność','Rekreacja i kultura','Edukacja','Pozostałe wydatki'],
      datasets:[
        {
            label: "Wydatki  ( % )",
            pointBackgroundColor: [ '#900040','#3030F0',"#FF0F30",'#109910',"#4090FF","#999910","#8000A0","#307020" ],
            borderColor: "#DD1040",
            data: [ 27,5,25,5,14,7,1,16 ],
            backgroundColor: "#AA555560"
            }
      ]
  },
 options: {
   legend: {
       display: false
   },
   title: {
      display:true,
      text: "Struktura miesięcznych wydatków na 1 osobę w gospodarstwie domowych 2017",
      fontColor: 'black',
      padding: 20,
      fontFamily:'Montserrat',
      fontSize: 18
   }
 }
});