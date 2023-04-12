function checkLogin(){
  if(document.loginForm.username.value==""){
    alert("Inserisci Username!");
    return false;
  }
  if(document.loginForm.psw.value==""){
    alert("Inserisci password!");
    return false;
  }
  return true;
}

function checkRegistrazione() {
  if(document.registrazioneForm.email.value=="") {
    alert("Inserisci una Email!");
    return false;
  }
  if(document.registrazioneForm.password.value=="") {
    alert("Inserisci una Password!");
    return false;
  }
  if(document.registrazioneForm.confirmPassword.value=="") {
    alert("Conferma la Password!");
    return false;
  }
  if(document.registrazioneForm.confirmPassword.value != document.registrazioneForm.password.value) {
    alert("Le password non coincidono");
    return false;
  }
  if(!document.registrazioneForm.donatore.checked && !document.registrazioneForm.associazione.checked) {
    alert("Devi essere un Donatore o una Associazione");
    return false;
  }
  if(document.registrazioneForm.donatore.checked) {
    if((document.registrazioneForm.nomeP.value=="" && document.registrazioneForm.cognomeP.value=="" && document.registrazioneForm.idAzienda.value=="") || (document.registrazioneForm.nomeP.value!="" && document.registrazioneForm.cognomeP.value=="" && document.registrazioneForm.idAzienda.value=="") || (document.registrazioneForm.nomeP.value=="" && document.registrazioneForm.cognomeP.value!="" && document.registrazioneForm.idAzienda.value=="")) {
      alert("Devi riempire tuoi campi");
      return false;
    }
    if(document.registrazioneForm.nomeP.value!="" && document.registrazioneForm.cognomeP.value!="" && document.registrazioneForm.idAzienda.value!="") {
      alert("Non puoi essere sia un privato che un'azienda");
      return false;
    }
    if(document.registrazioneForm.telDonatore.value=="") {
      alert("Inserisci il numero del telefono");
      return false;
    }
  }
  if(document.registrazioneForm.associazione.checked) {
    if(document.registrazioneForm.nomeAssociazione.value=="") {
      alert("Inserisci il nome associazione")
      return false;
    }
    if(document.registrazioneForm.telAssociazione.value=="") {
      alert("Inserisci il numero del telefono");
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

//Per il momento non utilizzata, perchè stimao usando la funzione mostraContenutoProva definita in myJsPROVA
function mostraContenuto(numero) {
  const container = document.querySelector('#scorriPagine');
  switch(numero) {
    case 1:
      container.innerHTML = '\
      <div class="row mt-2">\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body\">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>\
    <div class="row mt-5">\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>\
  <hr>\
  <nav aria-label="...">\
      <ul class="pagination justify-content-center">\
        <li class="page-item disabled">\
        <button  class="page-link">Previous</button>\
        </li>\
        <li aria-current="page" class="page-item active"><button class="page-link" onclick="mostraContenuto(1); scrollaSuContenuti();">1</button></li>\
        <li class="page-item">\
          <button  class="page-link" onclick="mostraContenuto(2); scrollaSuContenuti();">2</button>\
        </li>\
        <li class="page-item"><button class="page-link" onclick="mostraContenuto(3); scrollaSuContenuti();">3</button></li>\
        <li class="page-item">\
        <button  class="page-link" onclick="mostraContenuto(2); scrollaSuContenuti();">Next</button>\
        </li>\
      </ul>\
    </nav>';
      break;
    case 2:
      container.innerHTML = '<div class="row mt-2">\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body\">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>\
    <div class="row mt-5">\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, PAG2 a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>\
  <hr>\
  <nav aria-label="...">\
      <ul class="pagination justify-content-center">\
        <li class="page-item">\
        <button  class="page-link" onclick="mostraContenuto(1); scrollaSuContenuti();">Previous</button>\
        </li>\
        <li class="page-item"><button class="page-link" onclick="mostraContenuto(1); scrollaSuContenuti();">1</button></li>\
        <li class="page-item active" aria-current="page">\
          <button  class="page-link" onclick="mostraContenuto(2); scrollaSuContenuti();">2</button>\
        </li>\
        <li class="page-item"><button class="page-link" onclick="mostraContenuto(3); scrollaSuContenuti();">3</button></li>\
        <li class="page-item">\
        <button  class="page-link" onclick="mostraContenuto(3); scrollaSuContenuti();">Next</button>\
        </li>\
      </ul>\
    </nav>';
      break;
    case 3:
      container.innerHTML = '<div class="row mt-2">\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body\">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>\
    <div class="row mt-5">\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, PAG3 a tutti i palati.</p>\
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
                <button class="btn btn-primary" type="button" onclick="aggiungiCarrello(this)"><i class="fas fa-plus"></i> Aggiungi al carrello</button>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>\
  <hr>\
  <nav aria-label="...">\
    <ul class="pagination justify-content-center">\
      <li class="page-item">\
        <button  class="page-link" onclick="mostraContenuto(2); scrollaSuContenuti();">Previous</button>\
      </li>\
      <li class="page-item">\
        <button class="page-link" onclick="mostraContenuto(1); scrollaSuContenuti();">1</button>\
      </li>\
      <li class="page-item">\
        <button  class="page-link" onclick="mostraContenuto(2); scrollaSuContenuti();">2</button>\
      </li>\
      <li class="page-item active" aria-current="page">\
        <button class="page-link" onclick="mostraContenuto(3); scrollaSuContenuti();">3</button>\
      </li>\
      <li class="page-item disabled">\
        <button  class="page-link">Next</button>\
      </li>\
    </ul>\
  </nav>';
      break;
    default:
      container.innerText = "Il numero selezionato non è valido";
      break;
  }
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
      removeButton.textContent = 'Rimuovi';
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
    removeButton.textContent = 'Rimuovi';
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
    alert("Dati del carrello acquisiti. Sarà contattato via mail per informazioni sul ritiro. Grazie!");
    resetAllCarrello();
    return true;
  } else {
    alert("Nessun elemento presente nel carrello!");
    return false;
  }
}

function scrollaHome() {
  const container = document.querySelector('#navHome'); 
  const yOffset = container.getBoundingClientRect().top + window.pageYOffset - 100;
  window.scrollTo({
    top: yOffset,
    behavior: 'smooth'
  });
}

function animateCardOn(card) {
  card.style.transform = "scale(1.1)";
  card.style.transition = "transform 0.3s ease-in-out";
}

function animateCardOff(card) {
  card.style.transform = "scale(1)";
  card.style.transition = "transform 0.3s ease-in-out";
}

function goToLogout(){
  window.location.href = "../myPhp/logout.php";
}