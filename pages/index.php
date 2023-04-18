<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>NoWaste - Home</title>
		<link rel="icon" type="image/x-icon" href="../src/iconaLogoN.ico">
		<link rel="stylesheet" href="../libraries/bootstrap-5.2.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../myCss/myCss.css">
		<link rel="stylesheet" href="../libraries/fontawesome-free-6.4.0-web/css/all.css">
		<script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
		<script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../libraries/jQuery.min.js"></script>
		<script src="../myJs/myJs.js"></script>
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
      <nav class="navbar navbar-expand-lg myNav" id="navHome">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-navicon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active selected-text" aria-current="page" href="index.php">Home</a>
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
	</li> </ul><div class="dropdown"><a class="btn dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i></a><ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"><li class="Myitem-dropdown"><h6>Email:</h6> '.$_SESSION["username"].' </li><li><a class="dropdown-item" style="cursor: pointer;" href="mieDonazioni.php">Le mie donazioni monetarie</a></li><li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalModificaPsw">Modifica Password</a></li><li><hr class="dropdown-divider"></li><li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalAvviso">Elimina profilo</a></li></ul></div>

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

	<div class="modal fade" id="modalAvviso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content bg-warning">
			<div class="modal-header">
				<h4 class="text-black" id="exampleModalLabel">Sei sicuro di voler eliminare il tuo profilo?</h4>
			</div>
			<div class="modal-footer">
				<div class="m-lg-auto">
				<button class="btn btn-danger" onclick="window.location.href = \'../myPhp/eliminaProfilo.php\'">SI</button>
				<button class="btn btn-success" data-bs-dismiss="modal" >NO. Torna indietro</button>
				</div>
			</div>
		</div>
	</div>
</div><button type="button" class="btn btn-danger" onclick="goToLogout();">LOGOUT</button>';
	}
?>
      </nav>
    </header>
		<div class="container">
			<div class="jumbotron">
				<div class="row">
					<div class="col-md-6">
						<h2 class="display-4">Chi siamo?</h2>
						<p class="testoHome">Siamo un'organizzazione che si impegna a creare una rete di contatti tra associazioni che donano cibo ai bisognosi e ristoranti o esercizi alimentari. Il nostro obiettivo è aiutare le persone che si trovano in difficoltà ad avere accesso a pasti nutritivi e salutari e allo stesso tempo evitare spreco di cibo. Con la nostra web-app, offriamo una piattaforma che semplifica la donazione di cibo da parte dei ristoranti e degli esercizi alimentari e la distribuzione da parte delle associazioni. Ci impegniamo a creare un ambiente collaborativo e inclusivo per promuovere il benessere e la giustizia sociale nella nostra comunità.</p>
					</div>
					<div class="col-md-6">
						<div id="carousel1" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="../src/carousel11.png" class="d-block w-100" alt="Immagine 1">
								</div>
								<div class="carousel-item">
									<img src="../src/carousel12.jpg" class="d-block w-100" alt="Immagine 2">
								</div>
								<div class="carousel-item">
									<img src="../src/carousel13.jpeg" class="d-block w-100" alt="Immagine 3">
								</div>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
							<ol class="carousel-indicators">
								<li data-bs-target="#carousel1" data-bs-slide-to="0" class="active"></li>
								<li data-bs-target="#carousel1" data-bs-slide-to="1"></li>
								<li data-bs-target="#carousel1" data-bs-slide-to="2"></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<hr class="my-4">
			<div class="jumbotron">
				<div class="row">
					<div class="col-md-6">
						<div id="carousel2" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="../src/carousel21.jpeg" class="d-block w-100" alt="Immagine 4">
								</div>
								<div class="carousel-item">
									<img src="../src/carousel22.jpg" class="d-block w-100" alt="Immagine 5">
								</div>
								<div class="carousel-item">
									<img src="../src/carousel23.png" class="d-block w-100" alt="Immagine 6">
								</div>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
							<ol class="carousel-indicators">
								<li data-bs-target="#carousel2" data-bs-slide-to="0" class="active"></li>
								<li data-bs-target="#carousel2" data-bs-slide-to="1"></li>
								<li data-bs-target="#carousel2" data-bs-slide-to="2"></li>
							</ol>
						</div>
					</div>
					<div class="col-md-6">
						<h2 class="display-4">Contribuisci!</h2>
							<p class="testoHome">Scegli di fare la differenza: dona il tuo cibo in eccesso e contribuisci a combattere lo 									spreco alimentare, a preservare l'ambiente e a migliorare la vita di coloro che sono in difficoltà nella tua 								 comunità locale. Il tuo gesto di generosità ha un impatto tangibile sulla salute e sul benessere di chi ne 										beneficia, promuovendo legami sociali più forti, dimostrando la tua responsabilità sociale e creando un 											futuro più sostenibile per tutti.</p>
					</div>
				</div>
			</div>
			<hr>
			<div class="jumbotron">
				<div class="row">
					<div class="col-md-6">
						<h2 class="display-4">Come unirti?</h2>
					  <p class="testoHome">Puoi unirti a noi come membro di un'associazione per prenotare il cibo messo a disposizione da ristoranti o alimentari, ma puoi entrare a far parte dell'organizzazione anche come azienda del settore alimentare che mette a dispozione sul nostro sito gli eccessi di cibo per semplificare il lavoro alle associazioni che distribuiscono ai bisognosi questi beni di prima necessità. </p>					
						<p class="testoHome">Inoltre puoi contribuire al progetto anche senza registrarti, facendo una donazione monetaria tramite l'apposita pagina.</p>
						<p class="testoHome">Clicca qui per esplorare le possibilità della nostra organizzazione.</p>
						<button class="btn btn-donate" id="btn-donate" onclick="scrollaHome();">Esplora</button>
					</div>
					<div class="col-md-6 marginiCarousel3">
						<div id="carousel3" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="../src/carousel31.jpeg" class="d-block w-100" alt="Immagine 7">
								</div>
								<div class="carousel-item">
									<img src="../src/carousel32.jpg" class="d-block w-100" alt="Immagine 8">
								</div>
								<div class="carousel-item">
									<img src="../src/carousel33.jpg" class="d-block w-100" alt="Immagine 9">
								</div>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carousel3" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carousel3" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
							<ol class="carousel-indicators">
								<li data-bs-target="#carousel3" data-bs-slide-to="0" class="active"></li>
								<li data-bs-target="#carousel3" data-bs-slide-to="1"></li>
								<li data-bs-target="#carousel3" data-bs-slide-to="2"></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
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