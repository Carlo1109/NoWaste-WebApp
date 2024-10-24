//In questo file viene creata l'applicazione "myfooter" tramite l'utilizzo di Vue.js per poter includere in tutte le nostre pagine il footer tramite la scrittura "<myfoooter></myfooter>"
let app = Vue.createApp({
  data: function() {
      return {
      }
  }
});
app.component("myfooter", {
  template: `
  <div class="container">
				<div class="row">
				<div class="col-md-4 mx-auto text-center">
					<h4 class="titleFooter">Contatti</h4>
					<ul class="list-unstyled">
						<li id="indirizzo">Indirizzo: <a style="cursor: pointer;" onmouseover="this.style.color='#aaa'" onmouseout="this.style.color='#fff'" onclick="openMap();">Viale Scalo San Lorenzo, Roma <i class="fa fa-map-marker fa-fw"></i></a></li>
						<li>Telefono: <a href="tel:06-1234567">06 1234567 <i class="fa fa-phone fa-fw"></i></a></li>
						<li>Email: <a href="mailto:info@nowaste.com">info@nowaste.com <i class="fa fa-mail-bulk fa-fw"></i></a></li>
					</ul>
				</div>
				<div class="col-md-4 mx-auto text-center" style="display: flex; flex-direction: column;">
						<h4 class="titleFooter">Social</h4>
						<ul class="list-unstyled-icon">
							<li><a href="https://it-it.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/?lang=it" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
					<div class="col-md-4 mx-auto text-center">
						<h4 class="titleFooter">Newsletter</h4>
						<p>Iscriviti alla newsletter NoWaste per ricevere tutte le novità</p>
						<form method="post" action="../myPhp/newsletter.php">
							<div class="input-group mb-3">
								<input type="email" name="emailIscritto" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" required>
								<input type="submit" class="btn btn-outline-secondary" id="button-addon2" value="Invia">
							</div>
						</form>
					</div>
				</div>
			</div>
  `
});
app.mount("#footernowaste");