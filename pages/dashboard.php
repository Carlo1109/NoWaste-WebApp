<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>NoWaste - Dashboard</title>
		<link rel="icon" type="image/x-icon" href="../src/iconaLogoN.ico">
		<link rel="stylesheet" href="../libraries/bootstrap-5.2.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../myCss/myCss.css">
		<link rel="stylesheet" href="../libraries/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
		<script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="../libraries/bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../myJs/myJs.js"></script>
    <script src="../libraries/jQuery.min.js"></script>
    <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
    <script src="../libraries/sweetalert2.all.min.js"></script>
    <script src="../libraries/vue.js"></script>
	</head>
  <?php
      echo '<body onload="caricaDashboard('.$_SESSION["assBoolean"].');">';
  ?>
  <header>
    <!--Parte di header fissa scritta su myLogo&Search-->
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
              <?php
                echo '<li class="nav-item"><a class="nav-link active" style="cursor: pointer;" onclick="return decidiPagina('.$_SESSION["assBoolean"].');">Area privata</a>
                </li>';
              ?>
            </ul>
            <div class="dropdown">
              <a class="btn dropdown-toggle" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <?php
                echo '<li class="Myitem-dropdown"><h6>Email:</h6>'.$_SESSION["username"].'</li>';
                ?>
                <hr class="dropdown-divider">
                <li><a class="dropdown-item selected-text" style="cursor: pointer;" href="dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" style="cursor: pointer;" href="mieDonazioni.php">Le mie donazioni monetarie</a></li>
                <li><a class="dropdown-item" href="datiUtente.php">Dati utente</a></li>
                <hr class="dropdown-divider">
                <li><a class="dropdown-item" onclick="showConfirm();">Elimina profilo</a></li>
              </ul>
            </div>
            <button type="button" class="btn btn-danger" onclick="goToLogout();">
              LOGOUT
            </button>
          </div>
        </div>
      </nav>
    </header>

    <?php
      if(!($_SESSION["assBoolean"])){ 
         echo '
         <div class="d-flex justify-content-center mt-4 mb-4">
          <div class="card cardDashboard">
            <h2 class="text-center mb-4">DASHBOARD</h2>
            <h5 class="text-center mb-4">Qui puoi visualizzare le richieste ricevute e svuotare la dashboard.</h5>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">Prodotto</th>
                    <th class="text-center" scope="col">Quantità</th>
                    <th class="text-center" scope="col">Richiesto da</th>
                    <th class="text-center" scope="col">Data richiesta</th>
                  </tr>
                </thead>
                <tbody id="miaDashboard">

                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center mt-4">
              <button id="pulisci" class="btn btn-outline-danger" onclick="confermaCleanDashboard(false);" disabled>
                <i class="fas fa-broom me-2"></i>
                <span>Svuota dashboard</span>
              </button>
            </div>
          </div>
        </div>';
      }
      else{
        echo '
         <div class="d-flex justify-content-center mt-4 mb-4">
          <div class="cardDashboard card">
            <h2 class="text-center mb-4">DASHBOARD</h2>
            <h5 class="text-center mb-4">Qui puoi visualizzare le richieste effettuate e svuotare la dashboard.</h5>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">Prodotto</th>
                    <th class="text-center" scope="col">Quantità</th>
                    <th class="text-center" scope="col">Caricato da</th>
                    <th class="text-center" scope="col">Data richiesta</th>
                  </tr>
                </thead>
                <tbody id="miaDashboard">

                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-center mt-4">
              <button id="pulisci" class="btn btn-outline-danger" onclick="confermaCleanDashboard(true);" disabled>
                <i class="fas fa-broom me-2"></i>
                <span>Svuota dashboard</span>
              </button>
            </div>
          </div>
        </div>';
      }
    ?>
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