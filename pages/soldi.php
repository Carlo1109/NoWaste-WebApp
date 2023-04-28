<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoWaste - Donazioni</title>
    <link rel="shortcut icon" href="../src/iconaLogoN.ico">
    <link rel="stylesheet" href="../libraries/bootstrap-5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../myCss/myCss.css">
    <link rel="stylesheet" href="../libraries/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
    <script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../myJs/myJs.js"></script>
    <script src="../libraries/sweetalert2.all.min.js"></script>
    <script src="../libraries/vue.js"></script>
  </head>
  <body>
  <header>
		  <div id="logosearch">
        <mylogosearch></mylogosearch>
      </div>
      <nav class="navbar navbar-expand-lg myNav" id="navHome">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-navicon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active selected-text" href="soldi.php">Donazioni</a>
              </li>
						<?php
	if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
		echo '<li class="nav-item">
		<a class="nav-link" href="#" onclick="return false;">Area privata</a>
	</li></ul><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">LOGIN</button><div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="loginTitle text-black" id="exampleModalLabel">Login</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><form method="post" action="../myPhp/login.php" name="loginForm" onsubmit="return checkLogin();"><div class="form-floating mb-3"><input type="email" name="username" class="form-control" id="username" placeholder="Inserisci l\'email"><label for="username" class="text-black">Email</label></div><div class="form-floating mb-3"><input type="password"  name="psw" class="form-control" id="psw" placeholder="Password"><label for="psw" class="text-black">Password</label></div></div><div class="modal-footer"><input type="submit" class="btn btn-primary" value="Login"><a href="sigin.php"><button type="button" class="btn btn-secondary">Sign in</button></a></div></form></div></div></div>';
	}
	else if ($_SESSION['logged_in'] == true) {
		echo '<li class="nav-item"><a class="nav-link active" style="cursor: pointer;" onclick="return decidiPagina('.$_SESSION["assBoolean"].');">Area privata</a>
	</li> </ul><div class="dropdown"><a class="btn dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i></a><ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"><li class="Myitem-dropdown"><h6>Email:</h6> '.$_SESSION["username"].' </li><hr class="dropdown-divider"><li><a class="dropdown-item" style="cursor: pointer;" href="dashboard.php">Dashboard</a></li>
<li><a class="dropdown-item" style="cursor: pointer;" href="mieDonazioni.php">Le mie donazioni monetarie</a></li><li><a class="dropdown-item" href="datiUtente.php">Dati utente</a></li><hr class="dropdown-divider"><li><a class="dropdown-item" onclick="showConfirm();">Elimina profilo</a></li></ul></div>

<button type="button" class="btn btn-danger" onclick="goToLogout();">LOGOUT</button>';
	}
?>
      </nav>
    </header>
    <div class="container">
      <div class="jumbotron">
        <h1 class="display-4">Dona per il cibo</h1>
        <p class="lead">Aiutaci a combattere la fame nel mondo!</p>
        <hr class="my-4">
        <p>Il cibo è un diritto umano fondamentale, ma molte persone nel mondo non hanno accesso a cibo sufficiente per soddisfare le loro esigenze nutrizionali di base. Con la tua donazione, puoi aiutarci a fornire cibo a chi ne ha bisogno.</p>
        <button class="btn btn-donate" id="btn-donate" onclick="scrollaPaginaDonazione();">Dona adesso</button>
      </div>
    </div>
    <div class="jumbotronImg">
      <div class="container">
        <h1 class="display-3 font-weight text-black">Il cibo è cultura, passione e condivisione</h1>
        <p class="lead text-black">Con un tuo piccolo pensiero, puoi regalare centinaia di sorrisi.</p>
      </div>
    </div>
    <hr>
    <div id="donazioneForm" class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h2 class="text-center mb-4">Fai una donazione</h2>
          <hr>
          <form method="post" id="formDonazione" action="../myPhp/donazioneMonetaria.php">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-4">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-4">
                  <label for="surname">Cognome:</label>
                  <input type="text" class="form-control" name="surname" id="surname" required>
                </div>
                <div class="mb-4">
                  <label for="phone">Numero di telefono:</label>
                  <input type="tel" class="form-control" id="phone" name="telefono" required>
                </div>
                <div class="mb-4">
                  <label for="birthdate">Data di nascita:</label>
                  <div class="input-group date">
                    <input type="date" class="form-control" name="birthdate" required>
                  </div>
                </div>
                <div class="mb-4">
                  <label for="email">Indirizzo email:</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-4">
                  <label for="country">Paese:</label>
                  <input type="text" class="form-control" name="country" id="country" required>
                </div>
                <div class="mb-4">
                  <label for="provincia">Provincia:</label>
                  <select class="form-select" name="province" aria-label="Province">
                    <option value="" selected="true"></option>
                    <option value="AG">Agrigento</option>
                    <option value="AL">Alessandria</option>
                    <option value="AN">Ancona</option>
                    <option value="AO">Aosta</option>
                    <option value="AR">Arezzo</option>
                    <option value="AP">Ascoli Piceno</option>
                    <option value="AT">Asti</option>
                    <option value="AV">Avellino</option>
                    <option value="BA">Bari</option>
                    <option value="BT">Barletta-Andria-Trani</option>
                    <option value="BL">Belluno</option>
                    <option value="BN">Benevento</option>
                    <option value="BG">Bergamo</option>
                    <option value="BI">Biella</option>
                    <option value="BO">Bologna</option>
                    <option value="BZ">Bolzano</option>
                    <option value="BS">Brescia</option>
                    <option value="BR">Brindisi</option>
                    <option value="CA">Cagliari</option>
                    <option value="CL">Caltanissetta</option>
                    <option value="CB">Campobasso</option>
                    <option value="CE">Caserta</option>
                    <option value="CT">Catania</option>
                    <option value="CZ">Catanzaro</option>
                    <option value="CH">Chieti</option>
                    <option value="CO">Como</option>
                    <option value="CS">Cosenza</option>
                    <option value="CR">Cremona</option>
                    <option value="KR">Crotone</option>
                    <option value="CN">Cuneo</option>
                    <option value="EN">Enna</option>
                    <option value="FM">Fermo</option>
                    <option value="FE">Ferrara</option>
                    <option value="FI">Firenze</option>
                    <option value="FG">Foggia</option>
                    <option value="FC">Forl&igrave;-Cesena</option>
                    <option value="FR">Frosinone</option>
                    <option value="GE">Genova</option>
                    <option value="GO">Gorizia</option>
                    <option value="GR">Grosseto</option>
                    <option value="IM">Imperia</option>
                    <option value="IS">Isernia</option>
                    <option value="AQ">L'aquila</option>
                    <option value="SP">La spezia</option>
                    <option value="LT">Latina</option>
                    <option value="LE">Lecce</option>
                    <option value="LC">Lecco</option>
                    <option value="LI">Livorno</option>
                    <option value="LO">Lodi</option>
                    <option value="LU">Lucca</option>
                    <option value="MC">Macerata</option>
                    <option value="MN">Mantova</option>
                    <option value="MS">Massa-Carrara</option>
                    <option value="MT">Matera</option>
                    <option value="ME">Messina</option>
                    <option value="MI">Milano</option>
                    <option value="MO">Modena</option>
                    <option value="MB">Monza e Brianza</option>
                    <option value="NA">Napoli</option>
                    <option value="NO">Novara</option>
                    <option value="NU">Nuoro</option>
                    <option value="OR">Oristano</option>
                    <option value="PD">Padova</option>
                    <option value="PA">Palermo</option>
                    <option value="PR">Parma</option>
                    <option value="PV">Pavia</option>
                    <option value="PG">Perugia</option>
                    <option value="PU">Pesaro e Urbino</option>
                    <option value="PE">Pescara</option>
                    <option value="PC">Piacenza</option>
                    <option value="PI">Pisa</option>
                    <option value="PT">Pistoia</option>
                    <option value="PN">Pordenone</option>
                    <option value="PZ">Potenza</option>
                    <option value="PO">Prato</option>
                    <option value="RG">Ragusa</option>
                    <option value="RA">Ravenna</option>
                    <option value="RC">Reggio Calabria</option>
                    <option value="RE">Reggio Emilia</option>
                    <option value="RI">Rieti</option>
                    <option value="RN">Rimini</option>
                    <option value="RM">Roma</option>
                    <option value="RO">Rovigo</option>
                    <option value="SA">Salerno</option>
                    <option value="SS">Sassari</option>
                    <option value="SV">Savona</option>
                    <option value="SI">Siena</option>
                    <option value="SR">Siracusa</option>
                    <option value="SO">Sondrio</option>
                    <option value="SU">Sud Sardegna</option>
                    <option value="TA">Taranto</option>
                    <option value="TE">Teramo</option>
                    <option value="TR">Terni</option>
                    <option value="TO">Torino</option>
                    <option value="TP">Trapani</option>
                    <option value="TN">Trento</option>
                    <option value="TV">Treviso</option>
                    <option value="TS">Trieste</option>
                    <option value="UD">Udine</option>
                    <option value="VA">Varese</option>
                    <option value="VE">Venezia</option>
                    <option value="VB">Verbano-Cusio-Ossola</option>
                    <option value="VC">Vercelli</option>
                    <option value="VR">Verona</option>
                    <option value="VV">Vibo valentia</option>
                    <option value="VI">Vicenza</option>
                    <option value="VT">Viterbo</option>
                  </select>
                </div>
                <div class="mb-4">
                  <label for="city">Città:</label>
                  <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="mb-4">
                  <label for="cap">CAP:</label>
                  <input type="text" class="form-control" id="cap" name="cap" required>
                </div>
                <div class="mb-4">
                  <label for="address">Indirizzo:</label>
                  <input type="text" class="form-control" id="address" name="address" required>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-4">
                  <label>Metodo di pagamento:</label>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                      <input class="form-check-input" type="radio" id="visa" name="paymentMethod" value="visa" onclick="showPayment();"> 
                      <i class="fab fa-cc-visa fa-2x"></i>
                    </label>
                    <label class="btn btn-secondary">
                      <input class="form-check-input" type="radio" id="mc" name="paymentMethod" value="mastercard" onclick="showPayment();">
                      <i class="fab fa-cc-mastercard fa-2x"></i>
                    </label>
                    <label class="btn btn-secondary">
                      <input class="form-check-input" type="radio" id="pp" name="paymentMethod" value="paypal" onclick="showPayment();" required>
                      <i class="fab fa-cc-paypal fa-2x"></i>
                    </label>
                  </div>
                </div>
                <div class="mb-4">
                  <label for="amount">Importo donazione:</label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="amount" name="amount" required>
                    <span class="input-group-text">&euro;</span>
                  </div>
                </div>
                <div id="formCC" style="display:none">
                  <div class="mb-4">
                    <label for="card" class="form-label">Numero carta di credito:</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="card" pattern="[0-9]{16}">
                      <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                    </div>
                  </div>
                  <div class="mb-4">
                    <label for="exp" class="form-label">Data di scadenza (MM/AA):</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="exp" pattern="(0[1-9]|1[0-2])\/([0-9]{2})">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                  </div>
                  <div class="mb-4">
                    <label for="cvv" class="form-label">CVV:</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="cvv" pattern="[0-9]{3,4}">
                      <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                  </div>
                </div>
                <div class="mb-4" id="formPaypal" style="display:none;">
                  <label for="emailPayPal">Indirizzo Pay-Pal:</label>
                  <input type="email" class="form-control" id="emailPayPal">
                </div>
              </div>
              <div class="col-md-6 m-auto text-center">
                <button type="submit" class="btn btn-donate" value="Dona adesso" form="formDonazione">DONA</button>
              </div>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div> 
    <footer class="bg-dark text-white" id="footernowaste">
			<myfooter></myfooter>			
		</footer>
		<button id="pulsante-scroll-up" class="btn btn-primary rounded-circle" onclick="scrollaPaginaSu()">
			<i class="fas fa-arrow-up"></i>
		</button>
		<script src="../myJs/myFooter.js"></script>
    <script src="../myJs/myLogo&Search.js"></script>
  </body>
</html>