<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>NoWaste - AreaPrivataDonatore</title>
		<link rel="shortcut icon" href="../src/iconaLogoN.ico">
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
	<body onload="caricaDonatore();">
		<header>
      <div id="logosearch">
        <mylogosearch></mylogosearch>
      </div>
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
              <li class="nav-item">
                <a class="nav-link active selected-text" style="cursor: pointer;">Area privata-Donatore</a>
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
                <hr class="dropdown-divider">
                <li><a class="dropdown-item" style="cursor: pointer;" href="dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" style="cursor: pointer;" href="mieDonazioni.php">Le mie donazioni monetarie</a></li>
                <li><a class="dropdown-item" href="datiUtente.php">Dati utente</a></li>
                <hr class="dropdown-divider">
                <li><a class="dropdown-item" onclick="showConfirm();">Elimina profilo</a>
                </li>
              </ul>
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
            <h2 class="mb-4">Dona cibo!</h2>
            <p>In questa sezione, hai l'opportunità di mettere a disposizione i cibi non venduti, contribuendo a ridurre gli sprechi alimentari. Potrai gestire facilmente i tuoi scaffali, aggiungendo, rimuovendo o modificando i prodotti già presenti, consentendo una raccolta del cibo più efficace e mirata. Insieme, possiamo lavorare per prevenire lo spreco alimentare e assicurare che i cibi in eccedenza raggiungano coloro che ne hanno bisogno in modo tempestivo ed efficiente. Grazie per la tua generosità e partecipazione in questa importante causa!<br>
            </p>
            <button class="btn btn-donate mt-auto" id="btn-donate" onclick="scrollaPaginaDonatore();">Vai a "Il mio scaffale"</button>
          </div>
        </div>
      </div>
      <div id="scorriPagineDon">
        

      
      </div>
      
      <div id="containerBasket" class="mt-5 containermb-4 d-flex justify-content-between align-items-center">
        <button class="cestino btn btn-info d-flex flex-column align-items-center justify-content-center w-25 mx-3" onclick="window.location.href = 'formDonatore.html';">
          <i class="fas fa-book fa-5x"></i>
          Aggiugni prodotti
        </button>
        <button class="m-lg-3 cestino btn btn-info d-flex flex-column align-items-center justify-content-center w-25 mx-3" data-bs-toggle="modal" data-bs-target="#modalElimina">
          <i class="fas fa-trash fa-5x"></i>
          Elimina prodotti
        </button>
      </div>
      <div class="modal fade" id="modalElimina" tabindex="-1" aria-labelledby="myModalTitle" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalTitle">Prodotti caricati</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="text-center" scope="col">Prodotto</th>
                      <th class="text-center" scope="col">Consumarsi preferibilmente entro:</th>
                    </tr>
                  </thead>
                  <tbody id="tableElimina">
                    <!--Tabella si aggiorna con gli elementi aggiunti-->
                  </tbody>
                </table>  
              </div>            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href = 'donatore.php';">Chiudi e ricarica</button>
              <button id="eliminaTutto" type="button" class="btn btn-secondary" onclick="eliminaTutti();"disabled>Elimina tutto</button>
            </div>
          </div>
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