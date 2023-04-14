<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
// Connessione al database PostgreSQL

$dbconn=pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=provaImmagini");
if (!$dbconn) {
    die("Connessione al database fallita: " . pg_last_error());
}
    $email = "ale@gmail.com";
    $fileToUpload = $_FILES['fileToUpload'];
    $fileName = $fileToUpload['name'];
    $fileTmpPath = $fileToUpload['tmp_name'];
    if (isset($_POST['vegano']))
      $isVegano = 1;
    else
      $isVegano = 0;
    // Leggi il contenuto del file
    $fileContent = file_get_contents($fileTmpPath);
    $fileContent = pg_escape_bytea($fileContent); // Escapare il contenuto del file per l'inserimento nel database

    // Query per inserire il file nel database
    $query = "INSERT INTO tabImmagini (nome, immagine, email, isVegano) VALUES ('$fileName', '$fileContent', '$email', '$isVegano')";
    $result = pg_query($dbconn, $query);
    if ($result) {
        echo "File caricato con successo nel database.";
    } else {
        echo "Errore durante il caricamento del file nel database: " . pg_last_error();
    }
?>
</body>
</html>