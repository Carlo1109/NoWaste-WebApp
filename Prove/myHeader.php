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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">NoWaste</a>
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
              <a class="nav-link active" onclick="return decidiPagina();">Area privata</a>
            </li>
          </ul>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            LOGIN
          </button>
          <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel">Login all'area privata</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="get">
                    <div class="mb-3">
                      <label for="name" class="form-label">Username</label>
                      <input type="text" class="form-control" id="name" placeholder="Inserisci l'username">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="psw" placeholder="Password">
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