
// Przechowanie elementu, na który zrzucamy obraz
var dropzone = document.getElementById('dropzone');

// Zatrzymanie domyślnego eventu
dropzone.addEventListener('dragover',function(e){
    e.stopPropagation();
    e.preventDefault();
});


// Event zrzucenia obrazu
dropzone.addEventListener('drop',function(e){
    // Zatrzymanie domyslnego zachowania i propagacji do elementów nadrzędnych
      e.preventDefault();
      e.stopPropagation();
  
    // Przechowaniu zrzuconego zdjęcia, oraz stworzenie obiektu FileReader.
    var plik = e.dataTransfer.files[0];
    var reader = new FileReader();

    // reader przechowuje URL zdjęcia
    reader.readAsDataURL(plik);

    // Czekamy na załadowanie zdjęcia
    reader.onload = function(e){

       // Zmieniamy żródło elementu img ukrytego na stronie na URL obrazu
       document.getElementById('toEditing').src = e.target.result;

    }
    
});

function pobierz() {
    // Stworzenie linku do pobrania zawartości elementu Canvas jako image/png
    var download = document.getElementById("pobranie");
    var image = document.getElementById("cnv2").toDataURL("image/png")
        .replace("image/png", "image/octet-stream");
    download.setAttribute("href", image);
    
    // Wywołanie kliknięcia na linku
    download.click();
}