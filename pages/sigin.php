<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoWaste - Registrazione</title>
    <link rel="shortcut icon" href="../src/iconaLogoN.ico">
    <link rel="stylesheet" href="../libraries/bootstrap-5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../myCss/myCss.css">
    <link rel="stylesheet" href="../libraries/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
    <script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="../myJs/myJs.js"></script>
    <script src="../libraries/sweetalert2.all.min.js"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg bg-gr">
        <div class="container">
          <div class="logo">
            <img src="../src/logo.png" class="imLog" alt="Logo NoWaste">
          </div>
          <div class="ricerca">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <nav class="navbar navbar-expand-lg myNav">
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
                <a class="nav-link active" href="soldi.php">Donazioni</a>
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
	</li> </ul><div class="dropdown"><a class="btn dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i></a><ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"><li class="Myitem-dropdown"><h6>Email:</h6> '.$_SESSION["username"].' </li><li><a class="dropdown-item" style="cursor: pointer;" href="mieDonazioni.php">Le mie donazioni monetarie</a></li><li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalModificaPsw">Modifica Password</a></li><li><hr class="dropdown-divider"></li><li><a class="dropdown-item" onclick="showConfirm();">Elimina profilo</a></li></ul></div>

	<div class="modal fade" id="modalModificaPsw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<h4 class="text-black" id="exampleModalLabel">Modifica Password</h4>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<form method="post" action="../myPhp/modificaPsw.php" name="modificaForm">
		<div class="form-floating mb-3">
		<input type="password" name="passwordCurr" class="form-control" id="passwordCurr" placeholder="Inserisci la password attuale" required><label for="passwordCurr" class="text-black">Password corrente</label></div><div class="form-floating mb-3"><input type="password"  name="passwordNew" class="form-control" id="passwordNew" placeholder="Nuova password" required><label for="passwordNew" class="text-black">Nuova Password</label></div>
		<div class="form-floating mb-3"><input type="password"  name="passwordNew2" class="form-control" id="passwordNew2" placeholder="Nuova password" required><label for="passwordNew2" class="text-black">Conferma password</label></div>
		</div><div class="modal-footer"><input type="submit" class="btn btn-primary" value="Conferma e invia"></div></form></div></div></div>
    
  <button type="button" class="btn btn-danger" onclick="goToLogout();">LOGOUT</button>';
	}
?>
      </nav>
    </header>
    <div class="form-container">
      <h2>Registrazione</h2>
      <form method="post" action="../myPhp/register.php" name="registrazioneForm" onsubmit="return checkRegistrazione()">
        <div class="mb-2">
          <label for="radioCheck">Seleziona l'opzione che ti riguarda:</label>
          <div class="form-check-inline" name="radioCheck"></div>
          <label class="form-check-label" for="donatore">Donatore</label>
          <input class="form-check-input" type="radio" id="donatore"  name="DonAss" value="donatore" onclick="showForm()">
          <label class="form-check-label" for="associazione">Associazione</label>
          <input class="form-check-input" type="radio" id="associazione"  name="DonAss" value="associazione" onclick="showForm()">
        </div>
        <div class="mb-2">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email" placeholder="Inserisci la tua email">
        </div>
        <div class="mb-2">
          <label for="password">Password:</label>
          <input type="password" class="form-control" name="password" placeholder="Inserisci la tua password">
        </div>
        <div class="mb-2">
          <label for="confirm-password">Conferma Password:</label>
          <input type="password" class="form-control" name="confirmPassword" placeholder="Conferma la tua password">
        </div>
        <div id="formDonatore" style="display:none;">
          <div class="mb-2">
            <label for="nome">Inserisci nome se sei un privato:</label>
            <input type="text" class="form-control" name="nomeP" placeholder="Nome">
          </div>
          <div class="mb-2">
            <label for="cognome">Inserisci cognome se sei un privato:</label>
            <input type="text" class="form-control" name="cognomeP" placeholder="Cognome">
          </div>
          <div class="mb-2">
            <label for="azienda">Inserisci identificativo azienda se sei un ristorante o un alimentare:</label>
            <input type="text" class="form-control" name="idAzienda" placeholder="Azienda">
          </div>
          <div class="mb-2">
            <label for="telDonatore">Inserisci numero di telefono dell'azienda:</label>
            <input type="tel" class="form-control" name="telDonatore" placeholder="Numero di telefono">
          </div>
        </div>
        <div id="formAssociazione" style="display:none;">
          <div class="mb-2">
            <label for="associazione">Inserisci nome associazione:</label>
            <input type="text" class="form-control" name="nomeAssociazione" placeholder="Nome associazione">
          </div>
          <div class="mb-2">
            <label for="telAssociazione">Inserisci numero di telefono dell'associazione:</label>
            <input type="tel" class="form-control" name="telAssociazione" placeholder="Numero di telefono">
          </div>
        </div>
        <div class="mb-2">
          <button type="submit" class="btn btn-primary btn-block" value="Registrati">Registrati</button>
          <button type="reset" class="btn btn-secondary btn-block" value="Reset" onclick="hideForm()">Reset</button>
        </div>
      </form>
    </div>
    <footer class="bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h4 class="titleFooter">Contatti</h4>
            <ul class="list-unstyled">
              <li>Indirizzo: Via Roma 123, 00100 Roma</li>
              <li>Telefono: 06 1234567</li>
              <li>Email: nowaste@gmail.com</li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="titleFooter">Social</h4>
            <ul class="list-unstyled-icon">
              <li><a href="https://it-it.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/?lang=it" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="titleFooter">Newsletter</h4>
            <p>Iscriviti alla nostra newsletter per ricevere tutte le novità</p>
            <form>
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="button-addon2">
                <input type="submit" class="btn btn-outline-secondary" id="button-addon2" value="Invia"></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </footer>
    <button id="pulsante-scroll-up" class="btn btn-primary rounded-circle" onclick="scrollaPaginaSu()">
      <i class="fas fa-arrow-up"></i>
    </button>
  </body>
</html>