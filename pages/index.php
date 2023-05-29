<!--
  Questa è la pagina HOME. Abbiamo utilizzato delle condizioni in php per poter modificare la navbar a seconda dell'avvenuto login o meno. Abbiamo aggiunto un button che permette di estendere la navbar con schermi di dimensioni ridotte. Qui l'utente può conoscere lo scopo del sito e può inoltre accedere ad alcune funzionalità senza aver effettuato il login.
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
		<title>NoWaste - Home</title>
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
			<!--fine-->
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
<!--Parte dinamica di login e logout, fatta in php-->
<?php
	if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
		echo '<li class="nav-item">
				<a class="nav-link" href="#" onclick="return false;">Area privata</a>
				</li></ul><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">LOGIN</button>
				<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	<!--inizio dei container con le descrizioni e foto-->
		<div class="container">
			<div class="jumbotron">
				<div class="row d-flex align-items-center">
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
				<div class="row d-flex align-items-center">
					<div class="col-md-6">
						<div id="carousel2" class="carousel slide h-100" data-bs-ride="carousel">
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
						<p class="testoHome">Scegli di fare la differenza: dona il tuo cibo in eccesso e contribuisci a combattere lo spreco alimentare, a preservare l'ambiente e a migliorare la vita di coloro che sono in difficoltà nella tua comunità locale. Il tuo gesto di generosità ha un impatto tangibile sulla salute e sul benessere di chi ne beneficia, promuovendo legami sociali più forti, dimostrando la tua responsabilità sociale e creando un futuro più sostenibile per tutti.</p>
					</div>
				</div>
			</div>
			<hr>
			<div class="jumbotron">
				<div class="row d-flex align-items-center">
					<div class="col-md-6">
						<h2 class="display-4">Come unirti?</h2>
					  <p class="testoHome">Puoi unirti a noi come membro di un'associazione per prenotare il cibo messo a disposizione da ristoranti o alimentari, ma puoi entrare a far parte dell'organizzazione anche come azienda del settore alimentare che mette a dispozione sul nostro sito gli eccessi di cibo per semplificare il lavoro alle associazioni che distribuiscono ai bisognosi questi beni di prima necessità. </p>					
						<p class="testoHome">Inoltre puoi contribuire al progetto anche senza registrarti, facendo una donazione monetaria tramite l'apposita pagina.</p>
						<p class="testoHome">Clicca qui per esplorare le possibilità della nostra organizzazione.</p>
						<button class="btn btn-donate mb-5" id="btn-donate" onclick="scrollaHome();">Esplora</button>
					</div>
					<div class="col-md-6">
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
		<!--Footer scritto in myFooter.js-->
		<footer class="bg-dark text-white" id="footernowaste">
			<myfooter></myfooter>			
		</footer>
		<!--Pulsante di risalita-->
		<button id="pulsante-scroll-up" class="btn btn-primary rounded-circle" onclick="scrollaPaginaSu()">
			<i class="fas fa-arrow-up"></i>
		</button>
		<script src="../myJs/myFooter.js"></script>
		<script src="../myJs/myLogo&Search.js"></script>
	</body>
</html>