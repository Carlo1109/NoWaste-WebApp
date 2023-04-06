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
}

function decidiPagina(){
  window.location.href = "../pages/associazione.html";
}

function showPayment(){
  console.log("Sono nella funz");
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
  let icona = pulsante.querySelector('.fa-plus');
  icona.classList.add('visibile');
  setTimeout(function() {
    icona.classList.add('traslazione-su');
    setTimeout(function() {
      icona.classList.remove('visibile', 'traslazione-su');
    }, 800);
  }, 100);
}




