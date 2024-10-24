<!--
  Questa è la pagina che permette all'utente  di visualizzare i propri dati di registrazione e di modificare ciascun campo. Grazie a dei controlli php stabiliamo se mostrare le informazioni associazione o donatore. In questa pagina è quindi presente un <div> che viene popolato tramite una chiamata AJAX.
-->
<?php
session_start();
$dbcon = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseUtenti");
$sessionUser = $_SESSION["username"];

$query = "SELECT * FROM utente WHERE email = '$sessionUser'";
$result = pg_query($dbcon, $query);

$userData = pg_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>NoWaste - DatiUtente</title>
		<link rel="icon" type="image/x-icon" href="../src/iconaLogoN.ico">
		<link rel="stylesheet" href="../libraries/bootstrap-5.2.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../myCss/myCss.css">
		<link rel="stylesheet" href="../libraries/fontawesome-free-6.4.0-web/css/all.css">
		<link rel="stylesheet" href="../libraries/sweetalert2.min.css">
		<script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
		<script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../libraries/jQuery.min.js"></script>
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
		<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="loginTitle text-black" id="exampleModalLabel">Login</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><form method="post" action="../myPhp/login.php" name="loginForm" onsubmit="return checkLogin();"><div class="form-floating mb-3"><input type="email" name="username" class="form-control" id="username" placeholder="Inserisci l\'email"><label for="username" class="text-black">Email</label></div><div class="form-floating mb-3"><input type="password"  name="psw" class="form-control" id="psw" placeholder="Password"><label for="psw" class="text-black">Password</label></div></div><div class="modal-footer"><input type="submit" class="btn btn-primary" value="Login"><a href="sigin.php"><button type="button" class="btn btn-secondary">Sign in</button></a></div></form></div></div></div>';
	}
	else if ($_SESSION['logged_in'] == true) {
		echo '<li class="nav-item"><a class="nav-link active" style="cursor: pointer;" onclick="return decidiPagina('.$_SESSION["assBoolean"].');">Area privata</a>
	</li> </ul><div class="dropdown"><a class="btn dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i></a><ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"><li class="Myitem-dropdown"><h6>Email:</h6> '.$_SESSION["username"].' </li><li><a class="dropdown-item" style="cursor: pointer;" href="dashboard.php">Dashboard</a></li><li><a class="dropdown-item" style="cursor: pointer;" href="mieDonazioni.php">Le mie donazioni monetarie</a></li><li><a class="dropdown-item selected-text" href="datiUtente.php">Dati utente</a></li><hr class="dropdown-divider"><li><a class="dropdown-item" onclick="showConfirm();">Elimina profilo</a></li></ul></div>

<button type="button" class="btn btn-danger" onclick="goToLogout();">LOGOUT</button>';
	}
?>
      </nav>
    </header>

		<div class="container">
			<div class="cardDati">
				<div class="cardDati-header">
					<h1 class="text-center cardDati-title">Dati dell'utente</h1>
				</div>
				<div class="cardDati-body">
					<form>
					<?php
						if($_SESSION["assBoolean"]){
							echo '<div class="row">
								<div class="col">
									<div class="row align-items-center">
										<div class="col-sm-4">
											<label class="form-label">Nome Associazione</label>
										</div>
										<div class="col">
											<input type="text" class="form-control mb-4" value="'.$userData['nomeass'].'" readonly>
										</div>
										<div class="col">
											<button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#editNomeAss">Modifica campo</button>
										</div>
									</div>
								</div>
								</div>';
						}
						else{
							if($userData['idaz']==''){
								echo '<div class="row">
								<div class="col">
									<div class="row align-items-center">
										<div class="col-sm-4">
											<label class="form-label">Nome Donatore</label>
										</div>
										<div class="col">
											<input type="text" class="form-control mb-4" value="'.$userData['nomep'].'" readonly>
										</div>
										<div class="col">
											<button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#editNomeP">Modifica campo</button>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="row align-items-center">
										<div class="col-sm-4">
											<label class="form-label">Cognome Donatore</label>
										</div>
										<div class="col">
											<input type="text" class="form-control mb-4" value="'.$userData['cognomep'].'" readonly>
										</div>
										<div class="col">
											<button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#editCognomeP">Modifica campo</button>
										</div>
									</div>
								</div>
							</div>';
							}
							else if($userData['idaz']!=''){
								echo '<div class="row">
								<div class="col">
									<div class="row align-items-center">
										<div class="col-sm-4">
											<label class="form-label">Id Azienda</label>
										</div>
										<div class="col">
											<input type="text" class="form-control mb-4" value="'.$userData['idaz'].'" readonly>
										</div>
										<div class="col">
											<button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#editIdAzienda">Modifica campo</button>
										</div>
									</div>
								</div>
							</div>';
							}
						}
						echo '<div class="row">
								<div class="col">
									<div class="row align-items-center">
										<div class="col-sm-4">
											<label class="form-label">Email</label>
										</div>
										<div class="col">
											<input type="text" class="form-control mb-4" value="'.$userData['email'].'" readonly>
										</div>
										<div class="col">
											<button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#editEmail">Modifica campo</button>
										</div>
									</div>
								</div>
							</div>';
							echo '<div class="row">
							<div class="col">
								<div class="row align-items-center">
									<div class="col-sm-4">
										<label class="form-label">Password</label>
									</div>
									<div class="col">
										<input type="password" class="form-control mb-4" value="'.$userData['pswd'].'" readonly>
									</div>
									<div class="col">
										<button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#editPassword">Modifica campo</button>
									</div>
								</div>
							</div>
						</div>';
						echo '<div class="row mb-4">
								<div class="col">
									<div class="row align-items-center">
										<div class="col-sm-4">
											<label class="form-label">Telefono</label>
										</div>
										<div class="col">
											<input type="text" class="form-control mb-4" value="'.$userData['telefono'].'" readonly>
										</div>
										<div class="col">
											<button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#editTelefono">Modifica campo</button>
										</div>
									</div>
								</div>
							</div>';
					?>
					</form>
				</div>
			</div>
		</div>

		<!-- MODAL DA VISUALIZZARE PER MODIFICARE DATI -->
		
		<div class="modal fade" id="editPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<h4 class="text-black" id="exampleModalLabel">Modifica Password</h4>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<form method="post" action="../myPhp/modificaPsw.php" name="modificaPswForm">
		<div class="form-floating mb-3">
		<input type="password" name="passwordCurr" class="form-control" id="passwordCurr" placeholder="Inserisci la password attuale" required><label for="passwordCurr" class="text-black">Password corrente</label></div><div class="form-floating mb-3"><input type="password"  name="passwordNew" class="form-control" id="passwordNew" placeholder="Nuova password" required><label for="passwordNew" class="text-black">Nuova Password</label></div>
		<div class="form-floating mb-3"><input type="password"  name="passwordNew2" class="form-control" id="passwordNew2" placeholder="Nuova password" required><label for="passwordNew2" class="text-black">Conferma password</label></div>
		</div><div class="modal-footer"><input type="submit" class="btn btn-primary" value="Conferma e invia"></div></form></div></div></div>

		<div class="modal fade" id="editTelefono" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<h4 class="text-black" id="exampleModalLabel">Modifica Telefono</h4>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<form method="post" action="../myPhp/modificaTel.php" name="modificaTelForm">
		<div class="form-floating mb-3">
		<input type="password" name="passwordCurr" class="form-control" id="passwordCurr" placeholder="Inserisci la password" required><label for="passwordCurr" class="text-black">Password corrente</label></div><div class="form-floating mb-3"><input type="tel"  name="telNew" class="form-control" id="telNew" placeholder="Nuovo numero di telefono" required><label for="telNew" class="text-black">Nuovo numero di Telefono</label></div>
		</div><div class="modal-footer"><input type="submit" class="btn btn-primary" value="Conferma e invia"></div></form></div></div></div>

		<div class="modal fade" id="editEmail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<h4 class="text-black" id="exampleModalLabel">Modifica Email</h4>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<form method="post" action="../myPhp/modificaEmail.php" name="modificaEmailForm">
		<div class="form-floating mb-3">
		<input type="password" name="passwordCurr" class="form-control" id="passwordCurr" placeholder="Inserisci la password" required><label for="passwordCurr" class="text-black">Password corrente</label></div><div class="form-floating mb-3"><input type="email"  name="emailNew" class="form-control" id="emailNew" placeholder="Nuova email" required><label for="emailNew" class="text-black">Nuova email</label></div>
		</div><div class="modal-footer"><input type="submit" class="btn btn-primary" value="Conferma e invia"></div></form></div></div></div>

		<div class="modal fade" id="editIdAzienda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<h4 class="text-black" id="exampleModalLabel">Modifica ID Azienda</h4>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<form method="post" action="../myPhp/modificaIDaz.php" name="modificaForm">
		<div class="form-floating mb-3">
		<input type="password" name="passwordCurr" class="form-control" id="passwordCurr" placeholder="Inserisci la password" required><label for="passwordCurr" class="text-black">Password corrente</label></div><div class="form-floating mb-3"><input type="text"  name="idazNew" class="form-control" id="idazNew" placeholder="Nuovo ID Azienda" required><label for="idazNew" class="text-black">Nuovo ID Azienda</label></div>
		</div><div class="modal-footer"><input type="submit" class="btn btn-primary" value="Conferma e invia"></div></form></div></div></div>

		<div class="modal fade" id="editCognomeP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<h4 class="text-black" id="exampleModalLabel">Modifica Cognome Privato</h4>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<form method="post" action="../myPhp/modificaCognome.php" name="modificaForm">
		<div class="form-floating mb-3">
		<input type="password" name="passwordCurr" class="form-control" id="passwordCurr" placeholder="Inserisci la password" required><label for="passwordCurr" class="text-black">Password corrente</label></div><div class="form-floating mb-3"><input type="text"  name="cognomepNew" class="form-control" id="cognomepNew" placeholder="Nuovo Cognome" required><label for="cognomepNew" class="text-black">Nuovo Cognome</label></div>
		</div><div class="modal-footer"><input type="submit" class="btn btn-primary" value="Conferma e invia"></div></form></div></div></div>

		<div class="modal fade" id="editNomeP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<h4 class="text-black" id="exampleModalLabel">Modifica Nome Privato</h4>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<form method="post" action="../myPhp/modificaNome.php" name="modificaForm">
		<div class="form-floating mb-3">
		<input type="password" name="passwordCurr" class="form-control" id="passwordCurr" placeholder="Inserisci la password" required><label for="passwordCurr" class="text-black">Password corrente</label></div><div class="form-floating mb-3"><input type="text"  name="nomepNew" class="form-control" id="nomepNew" placeholder="Nuovo Nome" required><label for="nomepNew" class="text-black">Nuovo Nome</label></div>
		</div><div class="modal-footer"><input type="submit" class="btn btn-primary" value="Conferma e invia"></div></form></div></div></div>

		<div class="modal fade" id="editNomeAss" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<h4 class="text-black" id="exampleModalLabel">Modifica Nome Associazione</h4>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<form method="post" action="../myPhp/modificaNomeAss.php" name="modificaForm">
		<div class="form-floating mb-3">
		<input type="password" name="passwordCurr" class="form-control" id="passwordCurr" placeholder="Inserisci la password" required><label for="passwordCurr" class="text-black">Password corrente</label></div><div class="form-floating mb-3"><input type="text"  name="nomeAssNew" class="form-control" id="nomeAssNew" placeholder="Nuovo Nome Associazione" required><label for="nomeAssNew" class="text-black">Nuovo Nome Associazione</label></div>
		</div><div class="modal-footer"><input type="submit" class="btn btn-primary" value="Conferma e invia"></div></form></div></div></div>

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