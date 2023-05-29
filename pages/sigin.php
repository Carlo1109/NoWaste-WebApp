<!--
  Questa è la pagina dove l'utente può effettuare la registrazione attraverso un form dinamico. Se l'utente dichiara di volersi registrare come DONATORE compilerà alcuni campi che saranno diversi dall'utente che vorrà registrarsi come ASSOCIAZIONE.
-->
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
    <script src="../libraries/vue.js"></script>
  </head>
  <body>
  <header>
  <!--Parte di header fissa scritta su myLogo&Search-->
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
                <a class="nav-link active" href="soldi.php">Donazioni</a>
              </li>
              <!--Parte dinamica di login e logout, fatta in php-->
						<?php
	if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
		echo '<li class="nav-item">
		<a class="nav-link" href="#" onclick="return false;">Area privata</a>
	</li></ul><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">LOGIN</button><div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="loginTitle text-black" id="exampleModalLabel">Login</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-center">
				<form method="post" action="../myPhp/login.php" name="loginForm" onsubmit="return checkLogin();">
					<div class="form-floating mb-3">
						<input type="email" name="username" class="form-control" id="username" placeholder="Inserisci l\'email">
						<label for="username" class="text-black">Email</label>
					</div>
					<div class="form-floating mb-3">
						<input type="password"  name="psw" class="form-control" id="psw" placeholder="Password">
						<label for="psw" class="text-black">Password</label>
					</div>
					<div class="modal-footer justify-content-center">
						<input type="submit" class="btn btn-primary text-center" value="Login">
					</div>
				</form>
				<p class="text-muted">Non hai un account? <a href="sigin.php">Registrati</a></p>
			</div>
		</div>
	</div>
</div>';
	}
	else if ($_SESSION['logged_in'] == true) {
		echo '<li class="nav-item"><a class="nav-link active" style="cursor: pointer;" onclick="return decidiPagina('.$_SESSION["assBoolean"].');">Area privata</a>
	</li> </ul><div class="dropdown"><a class="btn dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i></a><ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"><li class="Myitem-dropdown"><h6>Email:</h6> '.$_SESSION["username"].' </li><hr class="dropdown-divider"><li><a class="dropdown-item" style="cursor: pointer;" href="dashboard.php">Dashboard</a></li><li><a class="dropdown-item" style="cursor: pointer;" href="mieDonazioni.php">Le mie donazioni monetarie</a></li><li><a class="dropdown-item" href="datiUtente.php">Dati utente</a></li><hr class="dropdown-divider"><li><a class="dropdown-item" onclick="showConfirm();">Elimina profilo</a></li></ul></div>

<button type="button" class="btn btn-danger" onclick="goToLogout();">LOGOUT</button>';
	}
?>
      </nav>
    </header>
    <div class="form-container mt-5 mb-5">
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
            <label for="telDonatore">Inserisci numero di telefono:</label>
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
    <!--Footer scritto in myFooter.js-->
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