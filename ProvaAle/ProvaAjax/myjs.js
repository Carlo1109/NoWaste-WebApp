document.addEventListener("DOMContentLoaded", function() {
    $.ajax({
        url: "dati.php", // URL del tuo file PHP
        dataType: "json", // Tipo di dato atteso come risposta (JSON in questo caso)
        success: function(response) {
          stampaPagina(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown); // Gestione degli errori
        }
    });
})

function stampaPagina(response) {
  var stringa = '';
  
  for (const Prodotto of response) {
    stringa+="<p>id: ";
    stringa+=Prodotto[0] + "</p>";
    stringa+="<p>email: ";
    stringa+=Prodotto[1] + "</p>";
    stringa+="<p>titolo: ";
    stringa+=Prodotto[2] + "</p>";
    stringa+="<p>marca: ";
    stringa+=Prodotto[3] + "</p>";
    stringa+="<p>isvegano: ";
    stringa+=Prodotto[4] + "</p>";
    stringa+="<p>isvegetariano: ";
    stringa+=Prodotto[5] + "</p>";
    stringa+="<p>isceliaco: ";
    stringa+=Prodotto[6] + "</p>";
    stringa+="<p>scad: ";
    stringa+=Prodotto[7];
    stringa+="<p>descrizione: ";
    stringa+=Prodotto[8] + "</p>";
    stringa+="<p>immagine: ";
    stringa+="<img src='"+Prodotto[9]+"'/></p>";
 
    stringa+="<br>" 
  }

  document.getElementById("spazio").innerHTML=stringa;
}