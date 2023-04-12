<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrazione</title>
</head>
<body>
  <?php
    $email = $_POST["email"];
    $pswd = $_POST["password"];
    $nomeP = $_POST["nomeP"];
    $cognomeP = $_POST["cognomeP"];
    $idAzienda = $_POST["idAzienda"];
    $nomeAssociazione = $_POST["nomeAssociazione"];
    if ($_POST["telDonatore"]!="") {
      $tel = $_POST["telDonatore"];
    }
    else {
      $tel = $_POST["telAssociazione"];
    }
    $dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseUtenti");
    $query = "SELECT * FROM utente WHERE email=$1";
    $result = pg_query_params($dbconn,$query,array($email));
    if ($line = pg_fetch_array($result)) {
      printf("Utente già registrato");
    }
    else {
      $query2 = "INSERT INTO utente (email,pswd,telefono,nomeass,nomep,cognomep,idaz) VALUES ($1,$2,$3,$4,$5,$6,$7)";
      $result2 = pg_query_params($dbconn,$query2,array($email,$pswd,$tel,$nomeAssociazione,$nomeP,$cognomeP,$idAzienda));
      if($result2) {
        printf("La registrazione è andata a buon fine");
      }
      else {
        die("La registrazione non è andata a buon fine");
      }
    }
    pg_close($dbconn);
  ?>
</body>
</html>