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
  window.scroll({top: 1200, behavior: 'smooth'});
}

function scrollaPaginaAssociazione() {
  window.scroll({top: 1350, behavior: 'smooth'});
}

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
  
  switch (numero) {
    case 1:
      container.innerHTML = '<div class="row mt-2">\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body\">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>';
      break;
    case 2:
      container.innerHTML = '<div class="row mt-2">\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body\">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice PAG 2 ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>';
      break;
    case 3:
      container.innerHTML = '<div class="row mt-2">\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body\">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
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
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma gustosa, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
      <div class="col-md-4">\
        <div class="card">\
          <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Pasta al pomodoro">\
          <div class="card-body">\
            <h5 class="card-title">Pasta al pomodoro</h5>\
            <p class="card-text">Una pietanza semplice ma PAG 3, adatta a tutti i palati.</p>\
          </div>\
        </div>\
      </div>\
    </div>\
  </div>';
      break;
    default:
      container.innerText = "Il numero selezionato non è valido";
      break;
  }
}