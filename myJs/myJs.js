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

function hideForm(){
  document.getElementById('formAssociazione').style.display = 'none';
  document.getElementById('formDonatore').style.display = 'none';
  document.getElementById('formPrivato').style.display = 'none';
  document.getElementById('formAzienda').style.display = 'none';
}

function decidiPagina(assBoolean){
  if(assBoolean)
    window.location.href = "../pages/associazione.php";
  else if(!assBoolean)
    window.location.href = "../pages/donatore.php";
}

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

function scrollaPaginaDonazione() {
  const container = document.querySelector('#donazioneForm'); 
  const yOffset = container.getBoundingClientRect().top + window.pageYOffset;
  window.scrollTo({
    top: yOffset,
    behavior: 'smooth'
  });
}

function scrollaPaginaAssociazione() {
  const container = document.querySelector('#containerBasket'); 
  const yOffset = container.getBoundingClientRect().top + window.pageYOffset;
  window.scrollTo({
    top: yOffset,
    behavior: 'smooth'
  });
}

function scrollaPaginaDonatore() {
  const container = document.querySelector('#containerBasket'); 
  const yOffset = container.getBoundingClientRect().top + window.pageYOffset;
  window.scrollTo({
    top: yOffset,
    behavior: 'smooth'
  });
}

//Listener per mostrare pulsante 'sali su'
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

function aggiungiCarrello(pulsante) {
  //Animazione '+'
  let icona = pulsante.querySelector('.fa-plus');
  icona.classList.add('visibile');
  setTimeout(function() {
    icona.classList.add('traslazione-su');
    setTimeout(function() {
      icona.classList.remove('visibile', 'traslazione-su');
    }, 800);
  }, 100);
  
  const nomeProdotto = pulsante.parentNode.parentNode.parentNode.querySelector('.card-title').textContent;
  const quantita = parseInt(pulsante.parentNode.parentNode.querySelector('#quantita-select').value);
  const tableBody = document.querySelector('#tableCarrello');
  let rowFound = false;
  //Controllo se il prodotto esiste già
  for (let i = 0; i < tableBody.rows.length; i++) {
    if (tableBody.rows[i].cells[0].textContent === nomeProdotto) {
      const quantitaPrecedente = parseInt(tableBody.rows[i].cells[1].textContent);
      const nuovaQuantita = quantitaPrecedente + quantita;
      tableBody.rows[i].cells[1].textContent = nuovaQuantita;

      //Aggiungo remove
      const removeButton = document.createElement('button');
      removeButton.innerHTML = '<i class="fas fa-trash"></i>'; //icona del cestino
      removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mx-1', 'rimuovi-button');
      removeButton.addEventListener('click', function() {
      const row = this.parentNode.parentNode;
        const quantitaPrecedente = parseInt(row.cells[1].textContent);
        const nuovaQuantita = quantitaPrecedente - 1;
        if (nuovaQuantita <= 0) {
          row.remove();
        } else {
          row.cells[1].textContent = nuovaQuantita;
        }
      });
      tableBody.rows[i].cells[2].innerHTML = '';
      tableBody.rows[i].cells[2].appendChild(removeButton);

      rowFound = true;
      break;
    }
  }
  //Aggiungo riga se il prodotto non esiste
  if (!rowFound) {
    const newRow = document.createElement('tr');
    const nameCell = document.createElement('td');
    nameCell.textContent = nomeProdotto;
    const quantityCell = document.createElement('td');
    quantityCell.textContent = quantita;
    const removeButton = document.createElement('button');
    removeButton.innerHTML = '<i class="fas fa-trash"></i>'; //icona del cestino
    removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mx-1', 'rimuovi-button');
    removeButton.addEventListener('click', function() {
      const row = this.parentNode.parentNode;
      const quantitaPrecedente = parseInt(row.cells[1].textContent);
      const nuovaQuantita = quantitaPrecedente - 1;
      if (nuovaQuantita <= 0) {
        row.remove();
      } else {
        row.cells[1].textContent = nuovaQuantita;
      }
    });
    const removeCell = document.createElement('td');
    removeCell.appendChild(removeButton);
    newRow.appendChild(nameCell);
    newRow.appendChild(quantityCell);
    newRow.appendChild(removeCell);
    tableBody.appendChild(newRow);
  }
  const modalCarrello = document.querySelector('#modalCarrello');
  const modal = bootstrap.Modal.getInstance(modalCarrello);
  modal.hide();
}

function resetAllCarrello() {
  const tableBody = document.querySelector('#tableCarrello');
  tableBody.innerHTML = '';
}

function checkCarrello() {
  const tableBody = document.getElementById('tableCarrello');
  if (tableBody.rows.length > 0) {
    Swal.fire({
      title: 'Dati del carrello acquisiti.',
      text: 'Sarai contattato via mail per informazioni sul ritiro. Grazie!',
      icon: 'success'
    });
    resetAllCarrello();
    return true;
  } else {
    Swal.fire({
      title: 'Oops...',
      text: 'Non è presente nessun elemento nel carrello',
      icon: 'error'
    });
    return false;
  }
}

function scrollaHome() {
  const container = $('#navHome');
  const yOffset = container.offset().top - 100;
  $('html, body').scrollTop(yOffset);
}

function animateCardOn(card) {
  $(card).css('cursor', 'pointer');
  $(card).css('transform', 'scale(1.1)');
  $(card).css('transition', 'transform 0.3s ease-in-out');
}

function animateCardOff(card) {
  $(card).css('cursor', 'default');
  $(card).css('transform', 'scale(1)');
  $(card).css('transition', 'transform 0.3s ease-in-out');
}

function goToLogout(){
  window.location.href = "../myPhp/logout.php";
}

//AJAX per recuperare dal server il database dei prodotti per la pagina Donatore
function caricaDonatore() {
  $.ajax({
      url: "../myPhp/uploadDonatore.php", // URL del tuo file PHP
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
    <div class="col-md-4">\
      <div class="card cardDonatore" onmouseover="animateCardOn(this)" onmouseout="animateCardOff(this)">\
        <img src="'+srcImmagine+'" class="card-img-top" width="200" height="300" alt="Image">\
        <div class="card-body\">\
          <h5 class="card-title">'+nomecard+'-'+marca+'</h5>\
          <p class="card-text">'+descrizione+'</p>\
          <p class="card-text">Prodotto vegano: '+isvegano+'</p>\
          <p class="card-text">Prodotto vegetariano: '+isvegetariano+'</p>\
          <p class="card-text">Prodotto celiaco: '+isceliaco+'</p>\
          <p class="card-text">Consumarsi preferibilmente entro: '+scad+'</p>\
        </div>\
      </div>\
    </div>';
    i+=1;
  }
  htmlSource+='</div>';
  document.getElementById("scorriPagineDon").innerHTML=htmlSource;
}

function loadEliminaProdotti(response){
  const tableBody = document.querySelector('#tableElimina');
  const eliminaTuttoButton = document.querySelector('#eliminaTutto')
  for(const prodotto of response){
    nome = prodotto[2];
    scad = prodotto[7];
    const newRow = document.createElement('tr');
    const nameCell = document.createElement('td');
    nameCell.textContent = nome;
    const scadenzaCell = document.createElement('td');
    scadenzaCell.textContent = scad;
    const removeButton = document.createElement('button');
    removeButton.innerHTML = '<i class="fas fa-trash"></i>'; //icona del cestino
    removeButton.classList.add('btn', 'btn-danger', 'btn-sm', 'mx-1', 'rimuovi-button');
    removeButton.addEventListener('click', function() {
      const row = this.parentNode.parentNode;
      const nomeProdotto = row.cells[0].textContent;
      const scadenzaProdotto = row.cells[1].textContent;
      row.remove();
      // Chiamata AJAX per eliminare la riga dal database
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../myPhp/eliminaProdotto.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (this.status === 200) {
          console.log(this.responseText);
        }
      }
      xhr.send('titolo=' + nomeProdotto + '&scad=' + scadenzaProdotto);
    });
    const removeCell = document.createElement('td');
    removeCell.appendChild(removeButton);
    newRow.appendChild(nameCell);
    newRow.appendChild(scadenzaCell);
    newRow.appendChild(removeCell);
    tableBody.appendChild(newRow);
  }
  if (tableBody.childElementCount > 0) {
    eliminaTuttoButton.disabled = false;
  } else {
    eliminaTuttoButton.disabled = true;
  }
}

//AJAX per recuperare dal server il database dei prodotti per la pagina Associazione
function caricaAssociazione() {
  $.ajax({
      url: "../myPhp/uploadAssociazione.php", // URL del tuo file PHP
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
        <div class="col-md-4">\
          <div class="card cardDonatore" onmouseover="animateCardOn(this)" onmouseout="animateCardOff(this)">\
            <img src="'+srcImmagine+'" class="card-img-top" width="200" height="300" alt="Pasta al pomodoro">\
            <div class="card-body\">\
              <h5 class="card-title">'+nomecard+'-'+marca+'</h5>\
              <p class="card-text">Caricato da: '+utente+'</p>\
              <p class="card-text">'+descrizione+'</p>\
              <p class="card-text">Prodotto vegano: '+isvegano+'</p>\
              <p class="card-text">Prodotto vegetariano: '+isvegetariano+'</p>\
              <p class="card-text">Prodotto celiaco: '+isceliaco+'</p>\
              <p class="card-text">Consumarsi preferibilmente entro: '+scad+'</p>\
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
        </div>';
        i+=1;
      }
      htmlSource+='</div>';
      container.innerHTML = htmlSource;
}

//AJAX per recuperare dal server il database delle donazioni per la pagina mieDonazioni
function caricaMieDonazioni() {
  $.ajax({
      url: "../myPhp/uploadDonazioniMonetarie.php", // URL del tuo file PHP
      dataType: "json", // Tipo di dato atteso come risposta (JSON in questo caso)
      success: function(response) {
        loadMieDonazioni(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.error(textStatus, errorThrown); // Gestione degli errori
      }
  });
}

function loadMieDonazioni(response) {
  const tableBody = $('#tableBodyMieDon');
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

function eliminaTutti(){
  $.ajax({
    url: '../myPhp/eliminaTutti.php',
    type: 'POST',
    success: function(response) {
      console.log(response);
      window.location.href = 'donatore.php';
    },
    error: function(xhr, status, error) {
      console.log(xhr.responseText);
    }
  });
}

function showConfirm(){
  Swal.fire({
    title: 'Sei sicuro di voler eliminare il profilo?',
    showDenyButton: true,
    confirmButtonText: 'Si',
    denyButtonText: `No. Cancella`,
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire('Eliminazione del profilo avvenuta con successo', '', 'success')
      window.location.href = "../myPhp/eliminaProfilo.php";
    } else if (result.isDenied) {
      Swal.fire('Eliminazione del profilo non avvenuta', '', 'info')
    }
  })
}