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
      $_SESSION["already_reg"] = "Utente già registrato. Premere OK per effettuare il login.";
    }
    else {
      $query2 = "INSERT INTO utente (email,pswd,telefono,nomeass,nomep,cognomep,idaz) VALUES ($1,$2,$3,$4,$5,$6,$7)";
      $result2 = pg_query_params($dbconn,$query2,array($email,$pswd,$tel,$nomeAssociazione,$nomeP,$cognomeP,$idAzienda));
      if($result2) {
        $_SESSION["success"] = "Registrazione andata a buon fine. Premere OK per effettuare il login.";
      }
      else {
        die("La registrazione non è andata a buon fine");
      }
    }
    pg_close($dbconn);
  ?>
  <script>
  <?php
  if (isset($_SESSION["already_reg"])){
    echo 'alert("' . $_SESSION["already_reg"] . '");';
    unset($_SESSION["already_reg"]);
    echo 'window.location.href = "../pages/index.php";';
  }
  if(isset($_SESSION["success"])){
    echo 'alert("' . $_SESSION["success"] . '");';
    unset($_SESSION["success"]);
    echo 'window.location.href = "../pages/index.php";';
  }
  ?>
</script>
</body>
</html>