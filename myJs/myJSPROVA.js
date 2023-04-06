function mostraContenutoProva(numero) {
  const container = document.querySelector('#scorriPagine');
  var stringa = '';
  switch(numero) {
    case 1:
      for(i=0;i<3;i++){
        stringa+= '<div class="row mt-5 mb-3">';
        for(j=0;j<3;j++){
          stringa+= '<div class="col-md-4">\
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
        </div>';
        }
        stringa+='</div>';
      }
      container.innerHTML = stringa;
      break;
    default:
      container.innerText = "Il numero selezionato non è valido";
      break;
  }
}
