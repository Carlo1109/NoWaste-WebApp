<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
  <script src="../libraries/sweetalert2.all.min.js"></script>
  <title>Registrazione</title>
</head>
<body>
<?php
  session_start();
  $dbconn=pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseDonazioniMonetarie");
  if (!$dbconn) {
      die("Connessione al database fallita: " . pg_last_error());
  }
  $nome = $_POST["name"];
  $cognome = $_POST["surname"];
  $email = $_POST["email"];
  $telefono = $_POST["telefono"];
  $nascita = $_POST["birthdate"];
  $paese = $_POST["country"];
  $provincia = $_POST["province"];
  $citta = $_POST["city"];
  $cap = $_POST["cap"];
  $indirizzo = $_POST["address"];
  $importo = $_POST["amount"];
  $datadon = date('Y-m-d');

  $query = "INSERT INTO monetaria (nome,cognome,email,telefono,nascita,paese,provincia,citta,cap,indirizzo,importo,datadon) VALUES ('$nome','$cognome','$email','$telefono','$nascita','$paese','$provincia','$citta','$cap','$indirizzo','$importo','$datadon')";
  $result = pg_query($dbconn, $query);

  if ($result) {
    $_SESSION["donazioneAvvenuta"] = "Donazione monetaria avvenuta con successo";
  } else {
      echo "Errore durante il pagamento: " . pg_last_error();
  }
?>
<script>
  <?php
  if (isset($_SESSION["donazioneAvvenuta"])) {
    echo 'Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "' . $_SESSION["donazioneAvvenuta"] . '"
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "../pages/soldi.php";
      }
    });';
    unset($_SESSION["donazioneAvvenuta"]);
  }
  ?>
</script>
</body>
</html>