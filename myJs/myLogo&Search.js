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
            <img src="../src/logo.png" class="imLog" alt="Logo NoWaste">
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