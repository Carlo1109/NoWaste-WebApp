//In questo file viene creata l'applicazione "mylogosearch" tramite l'utilizzo di Vue.js per poter includere in tutte le nostre pagine il footer tramite la scrittura "<mylogosearch></mylogosearch>"
let app2 = Vue.createApp({
  data: function() {
      return {
      }
  }
});
app2.component("mylogosearch", {
  template: `
  <nav class="navbar navbar-expand-lg bg-gr">
        <div class="container">
          <div class="logo">
            <a href="index.php"><img src="../src/logo.png" class="imLog" alt="Logo NoWaste"></a>
          </div>
          <div class="ricerca">
						<form class="d-flex" name="search" role="search" onsubmit="searchWeb(event)">
							<input class="form-control me-2" type="search" placeholder="Cerca sul web..." aria-label="Search" id="searchText" name="searchText">
							<button class="btn btn-outline-success" type="submit"><i class="fab fa-google fa-fw"></i></button>
						</form>
					</div>
        </div>
      </nav>
  `
});
app2.mount("#logosearch");