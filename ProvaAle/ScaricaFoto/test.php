<!DOCTYPE html>
<html>
<head>
    <title>Modulo di Caricamento con Salvataggio nel Database</title>
</head>
<body>
    <h1>Caricamento di File con Salvataggio nel Database</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <div class="mb-4">
          <label for="tipo">Tipo:</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="vegano">
            <label class="form-check-label" for="vegano">Vegano</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="vegetariano">
            <label class="form-check-label" for="vegetariano">Vegetariano</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="celiaco">
            <label class="form-check-label" for="celiaco">Celiaco</label>
          </div>
        </div>
        <input type="submit" value="Carica">
      </form>
</body>
</html>