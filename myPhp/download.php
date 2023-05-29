<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
    <script src="../libraries/sweetalert2.all.min.js"></script>
    <title>Download</title>
  </head>
  <body>
  <?php
    // Avvia la sessione
    session_start();

    // Connessione al database
    $dbconn=pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseProdotti");
    if (!$dbconn) {
        die("Connessione al database fallita: " . pg_last_error());
    }

    // Verifica se è stato caricato un file immagine
    if ($_FILES['immagine']['size'] == 0) {
      // Se non è stato caricato un file, imposta un'immagine di default
      $defaultImagePath = '../src/prodotti/default.jpg';
      $_FILES['immagine']['tmp_name'] = $defaultImagePath;
      $_FILES['immagine']['name'] = basename($defaultImagePath);
    }

    $immagine = $_FILES['immagine']; 
    $fileName = $immagine['name']; // Nome del file
    $fileTmpPath = $immagine['tmp_name']; // Path temporaneo dove salvare l'immagine

    // Recupera i dati dal modulo
    $email = $_SESSION["username"]; // Utente che carica
    $titolo = $_POST["titolo"];
    $marca = $_POST["marca"];

    // Verifica se è selezionata l'opzione "vegano"
    if (isset($_POST['vegano']))
        $isVegano = 1;
      else
        $isVegano = 0;

    // Verifica se è selezionata l'opzione "vegetariano"
    if (isset($_POST['vegetariano']))
      $isVegetariano = 1;
    else
      $isVegetariano = 0;

    // Verifica se è selezionata l'opzione "celiaco"
    if (isset($_POST['celiaco']))
      $isCeliaco = 1;
    else
      $isCeliaco = 0;

    $scad = $_POST["scad"];
    $datetime = DateTime::createFromFormat('Y-m-d', $scad);
    $formatted_scad = $datetime->format('d-m-Y');
    $descrizione = $_POST["descrizione"];

    // Legge il contenuto del file immagine
    $fileContent = file_get_contents($fileTmpPath);

    // Escapa il contenuto del file per l'inserimento nel database
    $fileContent = pg_escape_bytea($fileContent); 

    // Query per l'inserimento del prodotto nel database
    $query = "INSERT INTO immagini (email,titolo,marca,isvegano,isvegetariano,isceliaco,scad,descrizione,immagine) VALUES ('$email','$titolo','$marca','$isVegano','$isVegetariano','$isCeliaco','$formatted_scad','$descrizione','$fileContent')";
    $result = pg_query($dbconn, $query);

    if ($result) {
      // Prodotto caricato con successo
      $_SESSION["caricamentoSuccess"] = "Prodotto caricato correttamente";
    } else {
        echo "Errore durante il caricamento del file nel database: " . pg_last_error();
    }
  ?>

  <script>
    <?php
    // Verifica se il caricamento del prodotto è avvenuto con successo
    if (isset($_SESSION["caricamentoSuccess"])) {
      echo 'Swal.fire({
        icon: "success",
        title: "Successo!",
        text: " '. $_SESSION["caricamentoSuccess"].' ",
        allowOutsideClick: false
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "../pages/donatore.php";
        }
      });';
      unset($_SESSION["caricamentoSuccess"]);
    }
    ?>
  </script>
  </body>
</html>
