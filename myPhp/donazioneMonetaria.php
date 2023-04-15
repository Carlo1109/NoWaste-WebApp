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
    echo 'alert("' . $_SESSION["donazioneAvvenuta"] . '");';
    unset($_SESSION["donazioneAvvenuta"]);
    echo 'window.location.href = "../pages/soldi.php";';
  }
  ?>
</script>