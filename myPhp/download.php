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
    session_start();
    $dbconn=pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseProdotti");
    if (!$dbconn) {
        die("Connessione al database fallita: " . pg_last_error());
    }
    // email varchar(40),
    // titolo varchar(40),
    // marca varchar(40),
    // isvegano boolean,
    // isvegetariano boolean,
    // isceliaco boolean,
    // scad varchar(40),
    // descrizione varchar(255),
    // immagine bytea
    if ($_FILES['immagine']['size'] == 0) {
      $defaultImagePath = '../src/prodotti/default.jpg';
      $_FILES['immagine']['tmp_name'] = $defaultImagePath;
      $_FILES['immagine']['name'] = basename($defaultImagePath);
    }
    $immagine = $_FILES['immagine']; 
    $fileName = $immagine['name']; //nome del file
    $fileTmpPath = $immagine['tmp_name']; //path temporaneo dove salvare l'immagine
    $email = $_SESSION["username"]; //utente che carica
    $titolo = $_POST["titolo"];
    $marca = $_POST["marca"];
    if (isset($_POST['vegano']))
        $isVegano = 1;
      else
        $isVegano = 0;
    if (isset($_POST['vegetariano']))
      $isVegetariano = 1;
    else
      $isVegetariano = 0;
    if (isset($_POST['celiaco']))
      $isCeliaco = 1;
    else
      $isCeliaco = 0;
    $scad = $_POST["scad"];
    $descrizione = $_POST["descrizione"];

    $fileContent = file_get_contents($fileTmpPath);
    $fileContent = pg_escape_bytea($fileContent); 

    $query = "INSERT INTO immagini (email,titolo,marca,isvegano,isvegetariano,isceliaco,scad,descrizione,immagine) VALUES ('$email','$titolo','$marca','$isVegano','$isVegetariano','$isCeliaco','$scad','$descrizione','$fileContent')";
    $result = pg_query($dbconn, $query);

    if ($result) {
      $_SESSION["caricamentoSuccess"] = "Prodotto caricato correttamente";
    } else {
        echo "Errore durante il caricamento del file nel database: " . pg_last_error();
    }
  ?>

  <script>
    <?php
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