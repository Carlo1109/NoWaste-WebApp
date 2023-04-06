function CreaStorage() {
  
  if(typeof(localStorage.utenti)=="undefined"){    
    localStorage.utenti="[]";
  }
  return null;
}

function InserisciUtente() {

  if ((document.form.cognome.value == "") || (document.form.nome.value == "") || (document.form.matricola.value == "") || (isNaN(document.form.matricola.value))) {
    alert("Inserire tutti i dati correttamente");
    return false;
  }
  var cognomeval = document.form.cognome.value;
  var nomeval = document.form.nome.value;
  var matricolaval = document.form.matricola.value;
  
  var nuovoUtente = {
    cognome: cognomeval,
    nome: nomeval,
    matricola: matricolaval
  };

  var temp = JSON.parse(localStorage.utenti);
  temp.push(nuovoUtente);
  localStorage.utenti = JSON.stringify(temp);

  return true;
}

function StampaStorage() {
  
  var utenti = JSON.parse(localStorage.utenti);
  var len = utenti.length;
  var tabella = "<h3>Dati raccoli</h3>" + "<table border=1 celpadding=1><tr><th>Cognome</th><th>Nome</th><th>Matricola</th></tr>";
  for (i=0; i<len; i++) {
    tabella += "<tr><td>";
    tabella += utenti[i].cognome;
    tabella += "</td><td>";
    tabella += utenti[i].nome;
    tabella += "</td><td>";
    tabella += utenti[i].matricola;
    tabella += "</td></tr>";
  }
  tabella += "</table>"
  document.getElementById("spaziodinamico").innerHTML = tabella;
  return null;
}

function ResetStorage() {
  localStorage.utenti = "[]";
  StampaStorage();
  return null;
}