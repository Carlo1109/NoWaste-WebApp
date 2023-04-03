function checkLogin(){
  if(document.loginForm.usurname.value==""){
    alert("Inserisci Usurname!");
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

function decidiPagina(){ //DA FAREE
  return true;
  //return false;
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
