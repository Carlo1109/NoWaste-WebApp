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
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nomeP = $_POST["nomeP"];
    $cognomeP = $_POST["cognomeP"];
    $idAzienda = $_POST["idAzienda"];
    $nomeAssociazione = $_POST["nomeAssociazione"];
    if ($_POST["telDonatore"]) {
      $tel = $_POST["telDonatore"];
    }
    else {
      $tel = $_POST["telAssociazione"];
    }
    $dbconn = pg_connect("host=localhost user=postgres password=password port=5433 dbname=Prova");
    $query = "SELECT * FROM utente where email=$1";
    $result = pg_query_params($dbconn,$query,array($email));
    if ($line = pg_fetch_array($result)) {
      
    }
  ?>
</body>
</html>