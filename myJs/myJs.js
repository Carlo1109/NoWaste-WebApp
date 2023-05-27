//In questo file sono presenti tutte le funzioni javascript e jQuery per gestire la nostra web-app

//Funzione che esegue i controlli sul form di login
function checkLogin(){
  if(document.loginForm.username.value==""){
    Swal.fire({
      title: 'Attenzione!',
      text: 'Inserisci email!',
      icon: 'warning'
    });
    return false;
  }
  if(document.loginForm.psw.value==""){
    Swal.fire({
      title: 'Attenzione!',
      text: 'Inserisci password!',
      icon: 'warning'
    });
    return false;
  }
  return true;
}

//Funzione che esegue i controlli sul form di registrazione
function checkRegistrazione() {
  if(document.registrazioneForm.email.value=="") {
    Swal.fire({
      title: 'Attenzione!',
      text: 'Inserisci email!',
      icon: 'warning'
    });
    return false;
  }
  if(document.registrazioneForm.password.value=="") {
    Swal.fire({
      title: 'Attenzione!',
      text: 'Inserisci password!',
      icon: 'warning'
    });
    return false;
  }
  if(document.registrazioneForm.confirmPassword.value=="") {
    Swal.fire({
      title: 'Attenzione!',
      text: 'Conferma password!',
      icon: 'warning'
    });
    return false;
  }
  if(document.registrazioneForm.confirmPassword.value != document.registrazioneForm.password.value) {
    Swal.fire({
      title: 'Attenzione!',
      text: 'Le password non coincidono!',
      icon: 'warning'
    });
    return false;
  }
  if(!document.registrazioneForm.donatore.checked && !document.registrazioneForm.associazione.checked) {
    Swal.fire({
      title: 'Attenzione!',
      text: 'Devi spuntare "Donatore" o "Associazione"!',
      icon: 'warning'
    });
    return false;
  }
  if(document.registrazioneForm.donatore.checked) {
    if((document.registrazioneForm.nomeP.value=="" && document.registrazioneForm.cognomeP.value=="" && document.registrazioneForm.idAzienda.value=="") || (document.registrazioneForm.nomeP.value!="" && document.registrazioneForm.cognomeP.value=="" && document.registrazioneForm.idAzienda.value=="") || (document.registrazioneForm.nomeP.value=="" && document.registrazioneForm.cognomeP.value!="" && document.registrazioneForm.idAzienda.value=="")) {
      Swal.fire({
        title: 'Attenzione!',
        text: 'Devi riempire i tuoi campi!',
        icon: 'warning'
      });
      return false;
    }
    if(document.registrazioneForm.nomeP.value!="" && document.registrazioneForm.cognomeP.value!="" && document.registrazioneForm.idAzienda.value!="") {
      Swal.fire({
        title: 'Attenzione!',
        text: 'Non puoi essere sia un privato che un\'azienda!',
        icon: 'warning'
      });
      return false;
    }
    if(document.registrazioneForm.telDonatore.value=="") {
      Swal.fire({
        title: 'Attenzione!',
        text: 'Inserisci numero di telefono!',
        icon: 'warning'
      });
      return false;
    }
  }
  if(document.registrazioneForm.associazione.checked) {
    if(document.registrazioneForm.nomeAssociazione.value=="") {
      Swal.fire({
        title: 'Attenzione!',
        text: 'Inserisci nome associazione!',
        icon: 'warning'
      });
      return false;
    }
    if(document.registrazioneForm.telAssociazione.value=="") {
      Swal.fire({
        title: 'Attenzione!',
        text: 'Inserisci numero di telefono!',
        icon: 'warning'
      });
      return false;
    }
  }
  return true;
}

//Funzione che nel form di registrazione controlla quale tipologia di account si è scelto e mostra il relativo form
function showForm() {
  var option1 = document.getElementById('associazione');
  var option2 = document.getElementById('donatore');
  var form1 = document.getElementById('formAssociazione');
  var form2 = document.getElementById('formDonatore');
  if (option1.checked) {
    form1.style.display = 'block';
    form2.style.display = 'none';
  } else if (option2.checked) {
    form1.style.display = 'none';
    form2.style.display = 'block';
  }
}

//Funzione che nel form di registrazione nasconde il form relativo all'account scelto
function hideForm(){
  document.getElementById('formAssociazione').style.display = 'none';
  document.getElementById('formDonatore').style.display = 'none';
  document.getElementById('formPrivato').style.display = 'none';
  document.getElementById('formAzienda').style.display = 'none';
}

//Funzione che al clic su "Area Privata" rimanda alla pagina adatta a seconda dell'utente loggato
function decidiPagina(assBoolean){
  if(assBoolean)
    window.location.href = "../pages/associazione.php";
  else if(!assBoolean)
    window.location.href = "../pages/donatore.php";
}

//Funzione che nel form di donazione monetaria controlla quale tipologia di pagamento si è scelto e mostra il relativo form
function showPayment(){
  var option1 = document.getElementById('visa');
  var option2 = document.getElementById('mc');
  var option3 = document.getElementById('pp');
  var form1 = document.getElementById('formCC');
  var form2 = document.getElementById('formPaypal');
  if (option1.checked || option2.checked) {
    form1.style.display = 'block';
    form2.style.display = 'none';
  } else if (option3.checked) {
    form1.style.display = 'none';
    form2.style.display = 'block';
  }
}

//Funzione che nella pagina "Donazioni", al clic sul pulsante "Dona Ora" fa uno scroll della pagina fino al form di donazione
function scrollaPaginaDonazione() {
  const container = document.querySelector('#donazioneForm'); 
  const yOffset = container.getBoundingClientRect().top + window.pageYOffset;
  window.scrollTo({
    top: yOffset,
    behavior: 'smooth'
  });
}

//Funzione che nella pagina "Area Privata-Associazione", al clic sul pulsante "Vai al carrello" fa uno scroll della pagina fino al button per aprire il carrello
function scrollaPaginaAssociazione() {
  const container = document.querySelector('#containerBasket'); 
  const yOffset = container.getBoundingClientRect().top + window.pageYOffset;
  window.scrollTo({
    top: yOffset,
    behavior: 'smooth'
  });
}

//Funzione che nella pagina "Area Privata-Donatore", al clic sul pulsante "Vai al mio scaffale" fa uno scroll della pagina fino ai button per visualizzare i prodotti caricati o inserirne degli altri
function scrollaPaginaDonatore() {
  const container = document.querySelector('#containerBasket'); 
  const yOffset = container.getBoundingClientRect().top + window.pageYOffset;
  window.scrollTo({
    top: yOffset,
    behavior: 'smooth'
  });
}

//Listener per mostrare pulsante 'sali su' su tutte le pagine e funzione per fare scroll fino a 'top'
window.addEventListener('scroll', function() {
  var pulsanteScrollUp = document.getElementById('pulsante-scroll-up');
  if (window.pageYOffset > 500) {
    pulsanteScrollUp.style.display = 'block';
  } else {
    pulsanteScrollUp.style.display = 'none';
  }
});
function scrollaPaginaSu() {
  window.scroll({top: 0, behavior: 'smooth'});
}


function scrollaSuContenuti() {
  const container = document.querySelector('#scorriPagine'); 
  const yOffset = container.getBoundingClientRect().top + window.pageYOffset - 100;
  window.scrollTo({
    top: yOffset,
    behavior: 'smooth'
  });
}

//Funzione che nella pagina "Area Privata-Associazione" al clic su i button "Aggiungi al carrello", crea un'animazione e aggiunge le informazioni del prodotto al modal del carrello
function aggiungiCarrello(pulsante) {
  //Animazione '+'
  let icona = $(pulsante).find('.fa-plus');
  icona.addClass('visibile');
  setTimeout(function() {
  icona.addClass('traslazione-su');
  setTimeout(function() {
  icona.removeClass('visibile traslazione-su');
  }, 800);
  }, 100);
  
  const nomeProdotto = $(pulsante).parent().parent().parent().find('#titoloCard').text();
  const quantita = parseInt($(pulsante).parent().parent().find('#quantita-select').val());
  const from = $(pulsante).parent().parent().parent().find('#utente').text();
  const tableBody = $('#tableCarrello');
  let rowFound = false;
  //Controllo se il prodotto esiste già
  tableBody.find('tr').each(function() {
  if ($(this).find('td:first').text() == nomeProdotto && $(this).find('td:nth-child(3)').text() == from) {
  const quantitaPrecedente = parseInt($(this).find('td:nth-child(2)').text());
  const nuovaQuantita = quantitaPrecedente + quantita;
  $(this).find('td:nth-child(2)').text(nuovaQuantita);
  
    //Aggiungo remove
    const removeButton = $('<button>').html('<i class="fas fa-trash"></i>').addClass('btn btn-danger btn-sm mx-1 rimuovi-button');
    removeButton.on('click', function() {
      const row = $(this).parent().parent();
      const quantitaPrecedente = parseInt(row.find('td:nth-child(2)').text());
      const nuovaQuantita = quantitaPrecedente - 1;
      if (nuovaQuantita <= 0) {
        row.remove();
      } else {
        row.find('td:nth-child(2)').text(nuovaQuantita);
      }
    });
    $(this).find('td:last').empty().append(removeButton);
  
    rowFound = true;
    return false;
  }
  });
  //Aggiungo riga se il prodotto non esiste
  if (!rowFound) {
  const newRow = $('<tr>');
  const nameCell = $('<td>').addClass("text-center").text(nomeProdotto);
  const quantityCell = $('<td>').addClass("text-center").text(quantita);
  const fromCell = $('<td>').addClass("text-center").text(from);
  const removeButton = $('<button>').html('<i class="fas fa-trash"></i>').addClass('btn btn-danger btn-sm mx-1 rimuovi-button');
  removeButton.on('click', function() {
  const row = $(this).parent().parent();
  const quantitaPrecedente = parseInt(row.find('td:nth-child(2)').text());
  const nuovaQuantita = quantitaPrecedente - 1;
  if (nuovaQuantita <= 0) {
  row.remove();
  } else {
  row.find('td:nth-child(2)').text(nuovaQuantita);
  }
  });
  const removeCell = $('<td>').append(removeButton);
  newRow.append(nameCell, quantityCell, fromCell, removeCell);
  tableBody.append(newRow);
  }
  const modalCarrello = $('#modalCarrello');
  const modal = new bootstrap.Modal(modalCarrello[0]);
  modal.hide();
}

//Funzione che nella pagina "Area Privata-Associazione", al clic sul pulsante "Reset" del modal del carrello resetta tutto il carrello
function resetAllCarrello() {
  $('#tableCarrello').empty();
}

//Funzione che nella pagina "Area Privata-Associazione", al clic sul pulsante "Conferma" del modal del carrello tramite la funzione "fetch" invia tramite POST le informazioni del carrello al database delle richieste
function checkCarrello(richiedente) {
  const tableBody = document.getElementById('tableCarrello');
  if (tableBody.rows.length > 0) {
    // Ottieni i dati della tabella
    const rows = tableBody.getElementsByTagName('tr');
    const data = [];
    for (let i = 0; i < rows.length; i++) {
      const cells = rows[i].getElementsByTagName('td');
      data.push({
        prodotto: cells[0].innerText,
        quantita: cells[1].innerText,
        caricatoDa: cells[2].innerText,
        richiestoDa : richiedente,
      });
    }
    // Invia la richiesta POST al server PHP
    fetch('../myPhp/richiesteProdotti.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Errore durante l\'inserimento dei dati');
      }
      return response.json();
    })
    .then(data => {
      console.log('Dati inseriti correttamente:', data);
      Swal.fire({
        title: 'Successo!',
        text: 'Dati del carrello acquisiti correttamente e inviati agli utenti propietari dei prodotti.',
        icon: 'success'
      });
      resetAllCarrello();
    })
    .catch(error => {
      console.error('Si è verificato un errore:', error);
    });
  }
  else{
    Swal.fire({
      title: 'Attenzione!',
      text: 'Il carrello è vuoto!',
      icon: 'warning'
    });
  }
}

//Funzione che nella pagina "Home", al clic sul pulsante "Esplora" fa uno scroll della pagina fino alla navbar 
function scrollaHome() {
  const container = $('#navHome');
  const yOffset = container.offset().top;
  $('html, body').scrollTop(yOffset);
}

//Funzione che aggiunge delle propietà css alle card dei prodotti per effettuare l'animazione onmousehover
function animateCardOn(card) {
  $(card).css('cursor', 'pointer');
  $(card).css('transform', 'scale(1.1)');
  $(card).css('transition', 'transform 0.3s ease-in-out');
}

//Funzione che ripristina le propietà css delle card dei prodotti quando si attiva onmouseout
function animateCardOff(card) {
  $(card).css('cursor', 'default');
  $(card).css('transform', 'scale(1)');
  $(card).css('transition', 'transform 0.3s ease-in-out');
}

//Funzione che rimanda alla pagina php che gestisce il logout
function goToLogout(){
  window.location.href = "../myPhp/logout.php";
}

//Chiamata AJAX per recuperare dal server il database dei prodotti per popolare la pagina Donatore e in seguito funzione che, tramite il risultato della chiamata AJAX, popola la pagina Donatore
function caricaDonatore() {
  $.ajax({
      url: "../myPhp/uploadDonatore.php", 
      dataType: "json", // Tipo di dato atteso come risposta (JSON in questo caso)
      success: function(response) {
        loadPaginaDonatore(response);
        loadEliminaProdotti(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error(textStatus, errorThrown); // Gestione degli errori
      }
  });
}
function loadPaginaDonatore(response) {
  var htmlSource='';
  var i=0;
  htmlSource+= '<div class="row mt-5 mb-3">';
  for(const prodotto of response){
    nomecard = prodotto[2];
    descrizione = prodotto[8];
    srcImmagine = prodotto[9];
    marca = prodotto[3];
    isvegano = prodotto[4];
    isvegetariano = prodotto[5];
    isceliaco = prodotto[6];
    scad = prodotto[7];
    if(i==3){
      htmlSource+='</div>';
      htmlSource+='<div class="row mt-5 mb-3">'
      i=0;
    }
    htmlSource+='\
    <div class="col-md-4 my-col">\
      <div class="card cardDonatore" onmouseover="animateCardOn(this)" onmouseout="animateCardOff(this)">\
        <img src="'+srcImmagine+'" class="card-img-top" width="200" height="300" alt="Image">\
        <div class="card-body\">\
          <h5 class="card-title">'+nomecard+'-'+marca+'</h5>\
          <p class="card-text">'+descrizione+'</p>';
          if(isvegano=='t'){
            htmlSource+='<p style="display: flex; align-items: center;">Prodotto vegano: <i class="fas fa-check" style="margin-left: 5px;"></i></p>';
          }
          else if(isvegano=='f'){
            htmlSource+='<p style="display: flex; align-items: center;">Prodotto vegano: <i class="fas fa-times" style="margin-left: 5px;"></i></p>';
          }
          if(isvegetariano=='t'){
            htmlSource+='<p style="display: flex; align-items: center;">Prodotto vegetariano: <i class="fas fa-check" style="margin-left: 5px;"></i></p>';
          }
          else if(isvegetariano=='f'){
            htmlSource+='<p style="display: flex; align-items: center;">Prodotto vegetariano: <i class="fas fa-times" style="margin-left: 5px;"></i></p>';
          }
          if(isceliaco=='t'){
            htmlSource+='<p style="display: flex; align-items: center;">Prodotto celiaco: <i class="fas fa-check" style="margin-left: 5px;"></i></p>';
          }
          else if(isceliaco=='f'){
            htmlSource+='<p style="display: flex; align-items: center;">Prodotto celiaco: <i class="fas fa-times" style="margin-left: 5px;"></i></p>';
          }
          htmlSource+='<p class="card-text">Consumarsi preferibilmente entro: '+scad+'</p>\
        </div>\
      </div>\
    </div>';
    i+=1;
  }
  container = document.getElementById("scorriPagineDon");
  container.innerHTML = "";
  htmlSource+='</div>';
  container.innerHTML=htmlSource;
  container.style.opacity = 1;
}

//Funzione che, tramite il risultato della chiamata AJAX precedente, popola il modal dove vengono visualizzati i prodotti in modo più schematico per poterli poi eliminare
function loadEliminaProdotti(response) {
  const tableBody = $('#tableElimina');
  const eliminaTuttoButton = $('#eliminaTutto');
  for (const prodotto of response) {
    const nome = prodotto[2];
    const scad = prodotto[7];
    const newRow = $('<tr>');
    const nameCell = $('<td>').text(nome).addClass('text-center');
    const scadenzaCell = $('<td>').text(scad).addClass('text-center');
    const removeButton = $('<button>').html('<i class="fas fa-trash"></i>').addClass('btn btn-danger btn-sm mx-1 rimuovi-button');
    removeButton.on('click', function() {
      const row = $(this).parent().parent();
      const nomeProdotto = row.find('td:first').text();
      const scadenzaProdotto = row.find('td:nth-child(2)').text();
      row.remove();

      $.post('../myPhp/eliminaProdotto.php', {titolo: nomeProdotto, scad: scadenzaProdotto}, function(data) {
        console.log(data);
      });
    });
    const removeCell = $('<td>').append(removeButton);
    newRow.append(nameCell, scadenzaCell, removeCell);
    tableBody.append(newRow);
  }
  if (tableBody.children().length > 0) {
    eliminaTuttoButton.prop('disabled', false);
  } else {
    eliminaTuttoButton.prop('disabled', true);
  }
}

//Chiamata AJAX per recuperare dal server il database dei prodotti per la pagina Associazione e in seguito funzione che, tramite il risultato della chiamata AJAX, popola la pagina Associazione
function caricaAssociazione() {
  $.ajax({
      url: "../myPhp/uploadAssociazione.php",
      dataType: "json", // Tipo di dato atteso come risposta (JSON in questo caso)
      success: function(response) {
        loadPaginaAssociazione(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error(textStatus, errorThrown); // Gestione degli errori
      }
  });
}
function loadPaginaAssociazione(response){
  const container = document.querySelector('#scorriPagine');
  container.innerHTML = "";
      var htmlSource = '<div class="row mt-5 mb-3">';
      var i = 0;
      for(const prodotto of response){
        utente = prodotto[1];
        nomecard = prodotto[2];
        descrizione = prodotto[8];
        srcImmagine = prodotto[9];
        marca = prodotto[3];
        isvegano = prodotto[4];
        isvegetariano = prodotto[5];
        isceliaco = prodotto[6];
        scad = prodotto[7];
        if(i==3){
          htmlSource+='</div>';
          htmlSource+='<div class="row mt-5 mb-3">'
          i=0;
        }
        htmlSource+='\
        <div class="col-md-4 my-col" >\
          <div class="card cardAssociazione" onmouseover="animateCardOn(this)" onmouseout="animateCardOff(this)">\
          <div class="cardAssociazione-front">\
            <img src="'+srcImmagine+'" class="card-img-top" width="200" height="300" alt="Pasta al pomodoro">\
            <div class="card-body\">\
              <h5 class="card-title info"><a onclick="rotateCard(this)"><span id="titoloCard">'+nomecard+'-'+marca+'</span> <i class="fas fa-info-circle"></i></a><span class="info-box">Clicca per ruotare e mostrare scadenza e descrizione</span></h5>\
              <p class="card-text">Caricato da: <span id="utente">'+utente+'</span></p>';
              if(isvegano=='t'){
                htmlSource+='<p style="display: flex; align-items: center;">Prodotto vegano: <i class="fas fa-check" style="margin-left: 5px;"></i></p>';
              }
              else if(isvegano=='f'){
                htmlSource+='<p style="display: flex; align-items: center;">Prodotto vegano: <i class="fas fa-times" style="margin-left: 5px;"></i></p>';
              }
              if(isvegetariano=='t'){
                htmlSource+='<p style="display: flex; align-items: center;">Prodotto vegetariano: <i class="fas fa-check" style="margin-left: 5px;"></i></p>';
              }
              else if(isvegetariano=='f'){
                htmlSource+='<p style="display: flex; align-items: center;">Prodotto vegetariano: <i class="fas fa-times" style="margin-left: 5px;"></i></p>';
              }
              if(isceliaco=='t'){
                htmlSource+='<p style="display: flex; align-items: center;">Prodotto celiaco: <i class="fas fa-check" style="margin-left: 5px;"></i></p>';
              }
              else if(isceliaco=='f'){
                htmlSource+='<p style="display: flex; align-items: center;">Prodotto celiaco: <i class="fas fa-times" style="margin-left: 5px;"></i></p>';
              }
              htmlSource+='\
            </div>\
              <div class="input-group mb-3 justify-content-center">\
                <div class="input-group-prepend">\
                  <label class="input-group-text" for="quantita-select">Quantità</label>\
                </div>\
                <select class="custom-select" id="quantita-select">\
                  <option selected>1</option>\
                  <option value="2">2</option>\
                  <option value="3">3</option>\
                  <option value="4">4</option>\
                  <option value="5">5</option>\
                </select>\
                <div class="input-group-append">\
                  <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi   al carrello</button>\
              </div>\
            </div>\
            </div>\
            <div class="cardAssociazione-back">\
              <p class="card-text">Consumarsi preferibilmente entro: '+scad+'</p>';
              if(descrizione==''){
                htmlSource += '<p class="card-text">Nessuna descrizione per il prodotto.</p>\
                <a onclick="rotateCard(this)"><i class="fas fa-undo fa-3x"></i></a>';
              }
              else{
                htmlSource += '\
                <p class="card-text">Descrizione: '+descrizione+'</p>\
                <a onclick="rotateCard(this)"><i class="fas fa-undo fa-3x"></i></a>';
              }
              htmlSource += '\
            </div>\
          </div>\
        </div>';
        i+=1;
      }
      htmlSource+='</div>';
      container.innerHTML = htmlSource;
      container.style.opacity = 1;
}

//Chiamata AJAX per recuperare dal server il database delle donazioni per la pagina mieDonazioni e in seguito funzione che, tramite il risultato della chiamata AJAX, popola la pagina mieDonazioni
function caricaMieDonazioni() {
  $.ajax({
      url: "../myPhp/uploadDonazioniMonetarie.php", 
      dataType: "json", 
      success: function(response) {
        loadMieDonazioni(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error(textStatus, errorThrown);
      }
  });
}
function loadMieDonazioni(response) {
  const tableBody = $('#tableBodyMieDon');
  if (response.length == 0) {
    tableBody.html('<tr><td colspan="14" class="text-center tdDon"><h6>Nessuna donazione monetaria presente</h6></td></tr>');
  }
  else{
    var num = 1;
    $.each(response, function(index, prodotto) {
      const newRow = $('<tr>');
      const cellNum = $('<td>').addClass('tdDon').text(num);
      newRow.append(cellNum);
      for (let i = 0; i <= 11; i++) {
        const newCell = $('<td>').addClass('tdDon').text(prodotto[i]);
        newRow.append(newCell);
      }
      tableBody.append(newRow);
      num += 1;
    });
  }
}

//Funzione che viene utilizzata all'interno del modal "Elimina Prodotti" della pagina Donatore per eliminare tutti i prodotti caricati dall'utente dalla tabella dal database dei prodotti. Utilizza AJAX
function eliminaTutti(){
  $.ajax({
    url: '../myPhp/eliminaTutti.php',
    type: 'POST',
    success: function(response) {
      console.log(response);
      window.location.href = '../pages/donatore.php';
    },
    error: function(xhr, status, error) {
      console.log(xhr.responseText);
    }
  });
}

//Funzione che mostra un pop-up di conferma prima di procedere con l'eliminazione del profilo utente e quindi richiamare il relativo file php "eliminaProfilo.php"
function showConfirm(){
  Swal.fire({
    title: 'Sei sicuro di voler eliminare il profilo?',
    icon: 'warning',
    showDenyButton: true,
    allowOutsideClick: false,
    confirmButtonText: 'Si',
    denyButtonText: `No`,
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "../myPhp/eliminaProfilo.php";
    } else if (result.isDenied) {
      Swal.fire('Eliminazione del profilo non avvenuta', '', 'info')
    }
  })
}

//Funzione che prende la stringa inserita nella barra di ricerca e in una nuova pagina effettua la ricerca tramite google della stringa inserita
function searchWeb(event) {
  if(document.search.searchText.value=='')
    return false;
  event.preventDefault();
  var searchText = document.getElementById('searchText').value;
  var searchUrl = 'https://www.google.com/search?q=' + encodeURI(searchText);
  window.open(searchUrl, '_blank'); 
  document.search.searchText.value='';
}

//Funzione che apre in un pop-up SweetAlert la mappa dell'indirizzo indicato nel footer
function openMap() {
  Swal.fire({
    title: '<strong>Visualizza sulla mappa</strong>',
    html: '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2969.8348142993414!2d12.51837777598391!3d41.896409471239764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f6185205c9bfd%3A0x773e8360f9a9e5e!2sEdificio%20Marco%20Polo!5e0!3m2!1sit!2sit!4v1682516415519!5m2!1sit!2sit" width="400" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
    showCloseButton: true,
    showConfirmButton: false,
    allowOutsideClick: false
  });
  var popup = document.querySelector('.swal2-popup');
  popup.style.backgroundColor = '#20c320';
}

//Chiamata AJAX per recuperare dal server il database delle richieste per la Dashboard e in seguito fuzione che, tramite il risultato della chiamata AJAX, popola la dasboard della pagina Dashboard
function caricaDashboard(assoc) {
  if(assoc){
    urldin = '../myPhp/uploadDashboardForAss.php';
  }
  else{
    urldin = '../myPhp/uploadDashboardForDon.php';
  }
  $.ajax({
      url: urldin, 
      dataType: "json",
      success: function(response) {
        loadDashboard(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error(textStatus, errorThrown); 
      }
  });
}
function loadDashboard(response) {
  const dashboard = $('#miaDashboard');
  if (response.length == 0) {
    dashboard.html('<tr><td colspan="4" class="text-center tdRic">Nessuna richiesta trovata</td></tr>');
  } else {
    $.each(response, function(index, richiesta) {
      const newRow = $('<tr>');
      for (let i = 0; i <= 3; i++) {
        const newCell = $('<td>').addClass('text-center').text(richiesta[i]);
        newRow.append(newCell);
      }
      dashboard.append(newRow);
      $('#pulisci').attr('disabled', false);
    });
  }
}

//Funzione che invia la richiesta al database di eliminare tutte le righe del database Richieste dell'utente che invia la richiesta. Utilizza AJAX
function svuotaDashboard(assoc){
  if(assoc){
    urldin = '../myPhp/svuotaDashboardAss.php';
  }
  else{
    urldin = '../myPhp/svuotaDashboardDon.php';
  }
  $.ajax({
    url: urldin,
    type: 'POST',
    success: function(response) {
      console.log(response);
      window.location.href = '../pages/dashboard.php';
    },
    error: function(xhr, status, error) {
      console.log(xhr.responseText);
    }
  });
}

//Funzione che mostra uno SweetAlert per chiedere conferma dello svuotamento della dashboard 
function confermaCleanDashboard(assoc){
  if(assoc){
    Swal.fire({
      title: 'Sei sicuro di voler svuotare la dashboard?',
      text: 'Svuotando la dashboard la svuoterai anche per gli utenti che hanno caricato i prodotti che hai prenotato.',
      icon: 'warning',
      showDenyButton: true,
      confirmButtonText: 'Si',
      denyButtonText: `No`,
      allowOutsideClick: false,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire('Dashboard svuotata con successo', '', 'success')
        svuotaDashboard(assoc);
      } else if (result.isDenied) {
        Swal.fire('Dashboard non svuotata', '', 'info')
      }
    })
  }
  else{
    Swal.fire({
      title: 'Sei sicuro di voler svuotare la dashboard?',
      text: 'Svuotando la dashboard la svuoterai anche per gli utenti che hanno richiesto i seguenti prodotti, in quanto confermi di essere in contatto con loro per la spedizione.',
      icon: 'warning',
      showDenyButton: true,
      confirmButtonText: 'Si',
      denyButtonText: `No`,
      allowOutsideClick: false,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire('Dashboard svuotata con successo', '', 'success')
        svuotaDashboard(assoc);
      } else if (result.isDenied) {
        Swal.fire('Dashboard non svuotata', '', 'info')
      }
    })
  }
}

//Funzione che aggiunge all classe "cardAssociazione" la classe css "flipped" quando l'utente intende ruotare la card
function rotateCard(link) {
  const card = link.closest('.cardAssociazione');
  card.classList.toggle('flipped');
}

