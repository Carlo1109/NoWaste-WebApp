function mostraContenutoProva(numero) {
  const container = document.querySelector('#scorriPagine');
  
  switch(numero) {
    case 1:
      var htmlSource = '';
      for(i=0;i<3;i++){
        htmlSource+= '<div class="row mt-5 mb-3">';
        for(j=0;j<3;j++){
          nomecard = "Pasta al pomodoro PAG1 " + i.toString() + j.toString();
          htmlSource+= '<div class="col-md-4">\
          <div class="card" onmouseover="animateCardOn(this)" onmouseout="animateCardOff(this)">\
            <img src="../src/card01.jpeg" class="card-img-top" alt="Pasta al pomodoro">\
            <div class="card-body\">\
              <h5 class="card-title">'+nomecard+'</h5>\
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
        htmlSource+='</div>';
      }
      htmlSource+='\
      <br>\
      <hr>\
      <nav aria-label="...">\
        <ul class="pagination justify-content-center">\
          <li class="page-item disabled">\
          <button  class="page-link">Previous</button>\
          </li>\
          <li aria-current="page" class="page-item active"><button class="page-link" onclick="mostraContenutoProva(1); scrollaSuContenuti();">1</button></li>\
          <li class="page-item">\
            <button  class="page-link" onclick="mostraContenutoProva(2); scrollaSuContenuti();">2</button>\
          </li>\
          <li class="page-item"><button class="page-link" onclick="mostraContenutoProva(3); scrollaSuContenuti();">3</button></li>\
          <li class="page-item">\
          <button  class="page-link" onclick="mostraContenutoProva(2); scrollaSuContenuti();">Next</button>\
          </li>\
        </ul>\
      </nav>';
      container.innerHTML = htmlSource;
      break;
    
    case 2:
      var htmlSource = '';
      for(i=0;i<3;i++){
        htmlSource+= '<div class="row mt-5 mb-3">';
        for(j=0;j<3;j++){
          nomecard = "Pasta al pomodoro PAG2 " + i.toString() + j.toString();
          htmlSource+= '<div class="col-md-4">\
          <div class="card" onmouseover="animateCardOn(this)" onmouseout="animateCardOff(this)">\
            <img src="../src/card01.jpeg" class="card-img-top" alt="Pasta al pomodoro">\
            <div class="card-body\">\
              <h5 class="card-title">'+nomecard+'</h5>\
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
        htmlSource+='</div>';
      }
      htmlSource+='\
      <br>\
      <hr>\
      <nav aria-label="...">\
        <ul class="pagination justify-content-center">\
          <li class="page-item">\
          <button  class="page-link" onclick="mostraContenutoProva(1); scrollaSuContenutiProva();">Previous</button>\
          </li>\
          <li class="page-item"><button class="page-link" onclick="mostraContenutoProva(1); scrollaSuContenuti();">1</button></li>\
          <li class="page-item active" aria-current="page">\
            <button  class="page-link" onclick="mostraContenutoProva(2); scrollaSuContenutiProva();">2</button>\
          </li>\
          <li class="page-item"><button class="page-link" onclick="mostraContenutoProva(3); scrollaSuContenuti();">3</button></li>\
          <li class="page-item">\
          <button  class="page-link" onclick="mostraContenutoProva(3); scrollaSuContenuti();">Next</button>\
          </li>\
        </ul>\
      </nav>';
      container.innerHTML = htmlSource;
      break;

    case 3:
      var htmlSource = '';
      for(i=0;i<3;i++){
        htmlSource+= '<div class="row mt-5 mb-3">';
        for(j=0;j<3;j++){
          nomecard = "Pasta al pomodoro PAG3 " + i.toString() + j.toString();
          htmlSource+= '<div class="col-md-4">\
          <div class="card" onmouseover="animateCardOn(this)" onmouseout="animateCardOff(this)">\
            <img src="../src/card01.jpeg" class="card-img-top" alt="Pasta al pomodoro">\
            <div class="card-body\">\
              <h5 class="card-title">'+nomecard+'</h5>\
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
        htmlSource+='</div>';
      }
      htmlSource+='\
      <br>\
      <hr>\
      <nav aria-label="...">\
        <ul class="pagination justify-content-center">\
          <li class="page-item">\
            <button  class="page-link" onclick="mostraContenutoProva(2); scrollaSuContenuti();">Previous</button>\
          </li>\
          <li class="page-item">\
            <button class="page-link" onclick="mostraContenutoProva(1); scrollaSuContenuti();">1</button>\
          </li>\
          <li class="page-item">\
            <button  class="page-link" onclick="mostraContenutoProva(2); scrollaSuContenuti();">2</button>\
          </li>\
          <li class="page-item active" aria-current="page">\
            <button class="page-link" onclick="mostraContenutoProva(3); scrollaSuContenuti();">3</button>\
          </li>\
          <li class="page-item disabled">\
            <button  class="page-link">Next</button>\
          </li>\
        </ul>\
      </nav>';
      container.innerHTML = htmlSource;
      break;
    default:
      container.innerText = "Il numero selezionato non è valido";
      break;
  }
}
