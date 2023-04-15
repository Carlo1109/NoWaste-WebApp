<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ita">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>NoWaste - AreaPrivataAssociazione</title>
		<link rel="icon" type="image/x-icon" href="../src/iconaLogoN.ico">
		<link rel="stylesheet" href="../libraries/bootstrap-5.2.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../myCss/myCss.css">
		<link rel="stylesheet" href="../libraries/fontawesome-free-6.4.0-web/css/all.css">
		<script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../myJs/myJs.js"></script>
    <script src="../libraries/jQuery.min.js"></script>
	</head>
	<body onload="caricaAssociazione();">
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
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="soldi.php">Donazioni</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active selected-text" style="cursor: pointer;">Area privata-Associazione</a>
              </li>
            </ul>
            <div class="dropdown">
              <a class="btn dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <?php
                echo '<li class="Myitem-dropdown"><h6>Email:</h6>'.$_SESSION["username"].'</li>';
                ?>
                <li class="Myitem-dropdown"><a class="nav-link active" style="cursor: pointer;" href="mieDonazioni.php"><h6>Le mie donazioni monetarie</h6></a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalAvviso">Elimina profilo</a>
                </li>
              </ul>
            </div>
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
            </div>
            <button type="button" class="btn btn-danger" onclick="goToLogout();">
              LOGOUT
            </button>
          </div>
        </div>
      </nav>
    </header>
    <div class="container mb-4">
      <div class="row">
        <div class="jumbotron">
          <div class="col-md-12 text-center">
            <h1 class="mb-4">Raccogli il cibo</h1>
            <p>In questa sezione è possibile visualizzare gli alimenti messi a disposzione da ristoranti ed esercizi alimentari per poter prenotare il cibo e organizzare un ritiro. Così facendo potremmo raccogliere cibo in modo più efficace e più mirato.<br>
              Potrai aggiungere il cibo a disposizione nel tuo carrello e procedere all'inoltro della richiesta alle aziende alimentari per ritirare. Cliccando sul pulsante sottostante potete visualizzare gli alimentari presenti nel vostro carrello, ma non ancora ritirati.</p>
            <button class="btn btn-donate mt-auto" id="btn-donate" onclick="scrollaPaginaAssociazione();">Vai a "Visualizza carrello"</button>
            <hr>
            <h3 class="mt-5">Consulta l'elenco degli alimenti disponibili e che puoi aggiungere al carrello:</h3>
          </div>
        </div>
      </div>
      <div id="scorriPagine">
        <!--Qui ci sarà la visualizzazione dinamica delle schede-->
      </div>
      <div id="containerBasket" class="container mb-4 d-flex justify-content-center">
        <button class="cestino btn btn-info d-flex flex-column align-items-center justify-content-center w-50" data-bs-toggle="modal" data-bs-target="#modalCarrello">
          <i class="fas fa-shopping-basket fa-5x"></i>
          Visualizza carrello
        </button>
      </div>      
      </div>
      <div class="modal fade" id="modalCarrello" tabindex="-1" aria-labelledby="myModalTitle" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalTitle">Contenuto carrello personale</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Prodotto</th>
                    <th scope="col">Quantità</th>
                  </tr>
                </thead>
                <tbody id="tableCarrello">
                  <!--Tabella si aggiorna con gli elementi aggiunti-->
                </tbody>
              </table>              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="checkCarrello();">Conferma</button>
              <button type="button" class="btn btn-secondary" onclick="resetAllCarrello();">Reset</button>
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