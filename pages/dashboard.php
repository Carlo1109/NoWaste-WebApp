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
	</head>
  <?php
    if(!($_SESSION["assBoolean"])){
      echo '<body onload="caricaDashboardDon();">';
    }
    else{
      echo '<body onload="caricaDashboardAss();">';
    }
  ?>
  <header>
      <nav class="navbar navbar-expand-lg bg-gr">
        <div class="container">
          <div class="logo">
            <img src="../src/logo.png" class="imLog" alt="Logo NoWaste">
          </div>
          <div class="ricerca">
						<form class="d-flex" name="search" role="search" onsubmit="searchWeb(event)">
							<input class="form-control me-2" type="search" placeholder="Cerca sul web..." aria-label="Search" id="searchText" name="searchText">
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
                <li><a class="dropdown-item selected-text" style="cursor: pointer;" href="dashboard.php">Dashboard</a></li>
                <li><a class="dropdown-item" style="cursor: pointer;" href="mieDonazioni.php">Le mie donazioni monetarie</a></li>
                <li><a class="dropdown-item" href="datiUtente.php">Dati utente</a></li>
                <li><hr class="dropdown-divider"></li>
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

    <?php
      if(!($_SESSION["assBoolean"])){ 
         echo '
         <div class="d-flex align-items-center justify-content-center mt-4">
         <div class="speech-bubble  bg-primary myBubble">
           <h2 class="text-center text-white mt-4">DASHBOARD</h2>
           <h5 class="text-center text-white mt-4">Qui puoi visualizzare le richieste ricevute e puoi svuotare la dashboard.<br>
           Attenzione! Svuotando la dashboard, la svuoterai anche per l\'utente che ha richiesto i prodotti in quanto confermi di aver preso visione dell\'ordine e di aver contattato il richiedente.</h5>
           <div class="containerTable mt-3 mb-5">
             <div class="table-responsive">
               <table class="tableDon table-sm">
                 <thead>
                   <tr>
                     <th class="thRic">Prodotto</th>
                     <th class="thRic">Quantità</th>
                     <th class="thRic">Richiesto da</th>
                     <th class="thRic">Data richiesta</th>
                   </tr>
                 </thead>
                 <tbody id="miaDashboard">
   
                 </tbody>
               </table>
             </div>
             <div class="d-flex justify-content-center mt-3">
             <button id="pulisci" class="btn btn-secondary" onclick="svuotaDashboard(false);" disabled>
               <div class="d-flex flex-column align-items-center">
                 <i class="fa fa-broom-ball fa-2x"></i>
                 <span class="text-center">Pulisci dashboard</span>
               </div>
             </button>
             </div>
           </div>
         </div>
        </div>';
      }
      else{
        echo '
         <div class="d-flex align-items-center justify-content-center mt-4">
         <div class="speech-bubble  bg-primary myBubble">
           <h2 class="text-center text-white mt-4">DASHBOARD</h2>
           <h5 class="text-center text-white mt-4">Qui puoi visualizzare le richieste effettuate e puoi svuotare la dashboard<br>
           Attenzione! Svuotando la dashboard, la svuoterai anche per l\'utente che ha caricato i prodotti in quanto confermi di essere già in contatto con l.</h5>
           <div class="containerTable mt-3 mb-5">
             <div class="table-responsive">
               <table class="tableDon table-sm">
                 <thead>
                   <tr>
                     <th class="thRic">Prodotto</th>
                     <th class="thRic">Quantità</th>
                     <th class="thRic">Caricato da</th>
                     <th class="thRic">Data richiesta</th>
                   </tr>
                 </thead>
                 <tbody id="miaDashboard">
   
                 </tbody>
               </table>
             </div>
             <div class="d-flex justify-content-center mt-3">
             <button id="pulisci" class="btn btn-secondary" onclick="svuotaDashboard(true);" disabled>
               <div class="d-flex flex-column align-items-center">
                 <i class="fa fa-broom-ball fa-2x"></i>
                 <span class="text-center">Pulisci dashboard</span>
               </div>
             </button>
             </div>
           </div>
         </div>
        </div>';
      }
    ?>

    <footer class="bg-dark text-white">
			<div class="container">
				<div class="row">
				<div class="col-md-4 mx-auto text-center">
					<h4 class="titleFooter">Contatti</h4>
					<ul class="list-unstyled">
						<li id="indirizzo">Indirizzo: <a href="#" onclick="openMap();">Viale Scalo San Lorenzo, Roma</a></li>
						<li>Telefono: <a href="tel:06-1234567">06 1234567</a></li>
						<li>Email: <a href="mailto:info@nowaste.com">info@nowaste.com</a></li>
					</ul>
				</div>
				<div class="col-md-4 mx-auto text-center">
						<h4 class="titleFooter">Social</h4>
						<ul class="list-unstyled-icon">
							<li><a href="https://it-it.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/?lang=it" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
					<div class="col-md-4 mx-auto text-center">
						<h4 class="titleFooter">Newsletter</h4>
						<p>Iscriviti alla nostra newsletter per ricevere tutte le novità</p>
						<form>
							<div class="input-group mb-3">
								<input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" required>
								<input type="submit" class="btn btn-outline-secondary" id="button-addon2" value="Invia">
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