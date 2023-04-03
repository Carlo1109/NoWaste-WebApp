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

$(function () {
  $('[data-provide="datepicker"]').datepicker({
    format: 'dd/mm/yyyy',
    endDate: '-18y',
    autoclose: true,
    todayHighlight: true
  });

  // Aggiungi la classe "fa" e "fa-calendar" all'icona del calendario
  $('.input-group-addon').html('<i class="fa fa-calendar"></i>');

  // Attiva il datepicker quando l'utente fa clic sull'input box di testo
  $('input[name="birthdate"]').on('focus', function () {
    $(this).closest('.date').datepicker('show');
  });
});