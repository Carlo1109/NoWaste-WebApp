<!DOCTYPE html>
<html lang="ita">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>NoWaste - Home</title>
		<link rel="shortcut icon" href="../../src/iconaLogoN.ico">
		<link rel="stylesheet" href="../../libraries/bootstrap-5.2.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../myCss/myCss.css">
		<link rel="stylesheet" href="../../myCss/myCssProva.css">
		<link rel="stylesheet" href="../../libraries/fontawesome-free-6.4.0-web/css/all.css">
		<script src="../../libraries/bootstrap-5.2.3/dist/js/bootstrap.min.js"></script>
		<script src="../../myJs/myJs.js"></script>
	</head>
	<body>
		<header>
      <nav class="navbar navbar-expand-lg bg-gr">
        <div class="container">
          <div class="logo">
            <img src="../../src/logo.png" class="imLog" alt="Logo NoWaste">
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
                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="donazioni.html">Donazioni</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active mioclasse" style="cursor: pointer;" onclick="return decidiPagina();">Area privata</a>
              </li>
            </ul>
<?php
	if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
		echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">';
		echo "LOGIN";
		echo "</button>";
	}
	else {
		echo '<div class="dropdown"><a class="btn dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i></a><ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"><li class="Myitem-dropdown">Username: </li><li class="Myitem-dropdown">Email: </li><li><hr class="dropdown-divider"></li><li><a class="dropdown-item " data-bs-toggle="modal" data-bs-target="#ModalLogout">Logout</a></li></ul></div><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalLogout">LOGOUT</button>';
	}
?>
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-black" id="exampleModalLabel">Login all'area privata</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="../myPhp/login.php" name="loginForm" onsubmit="return checkLogin();">
                      <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Inserisci l'username">
                      </div>
                      <div class="mb-3">
                        <label for="psw" class="form-label">Password</label>
                        <input type="password"  name="psw" class="form-control" id="psw" placeholder="Password">
                      </div>
                  </div>
                    <div class="modal-footer">
                      <input type="reset" class="btn btn-secondary" value="Reset">
                      <input type="submit" class="btn btn-primary" value="Login">
                      <a href="sigin.html"><button type="button" class="btn btn-secondary">Sig in</button></a>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
		<div class="container">
			<div class="jumbotron">
				<div class="row">
					<div class="col-md-6">
						<h2 class="display-4">Chi siamo?</h2>
						<p class="testoHome">Siamo un'azienda alimentare che si impegna a produrre alimenti di alta qualità, sani e gustosi.</p>
					</div>
					<div class="col-md-6">
						<div id="carousel1" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="../src/prova1.jpeg" class="d-block w-100" alt="Immagine 1">
								</div>
								<div class="carousel-item">
									<img src="../src/prova2.jpeg" class="d-block w-100" alt="Immagine 2">
								</div>
								<div class="carousel-item">
									<img src="../src/prova3.jpeg" class="d-block w-100" alt="Immagine 3">
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
									<img src="../src/prova1.jpeg" class="d-block w-100" alt="Immagine 4">
								</div>
								<div class="carousel-item">
									<img src="../src/prova2.jpeg" class="d-block w-100" alt="Immagine 5">
								</div>
								<div class="carousel-item">
									<img src="../src/prova3.jpeg" class="d-block w-100" alt="Immagine 6">
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
							<li><a href="#"><i class="fab fa-facebook"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-instagram"></i></a></li>
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