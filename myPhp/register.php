<!--
  Questo file php gestisce la registrazione di un nuovo utente all'interno del sito. Quindi fa dei controlli per verificare che l'utente non sia già iscritto e aggiunge i dati al database utenti.
-->
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
      // Recupera i valori dei campi del modulo di registrazione
      $email = $_POST["email"];
      $pswd = $_POST["password"];
      $nomeP = $_POST["nomeP"];
      $cognomeP = $_POST["cognomeP"];
      $idAzienda = $_POST["idAzienda"];
      $nomeAssociazione = $_POST["nomeAssociazione"];

      // Verifica quale campo telefono utilizzare
      if ($_POST["telDonatore"] != "") {
        $tel = $_POST["telDonatore"];
      } else {
        $tel = $_POST["telAssociazione"];
      }

      // Connessione al database
      $dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseUtenti");

      // Verifica se l'utente è già registrato
      $query = "SELECT * FROM utente WHERE email=$1";
      $result = pg_query_params($dbconn, $query, array($email));
      
      if ($line = pg_fetch_array($result)) {
        // L'utente è già registrato, mostra un messaggio di errore
        $_SESSION["already_reg"] = "Utente già registrato. Premere OK per effettuare il login.";
      } else {
        // Inserisci il nuovo utente nel database
        $query2 = "INSERT INTO utente (email, pswd, telefono, nomeass, nomep, cognomep, idaz) VALUES ($1, $2, $3, $4, $5, $6, $7)";
        $result2 = pg_query_params($dbconn, $query2, array($email, $pswd, $tel, $nomeAssociazione, $nomeP, $cognomeP, $idAzienda));

        if ($result2) {
          // Registrazione avvenuta con successo, mostra un messaggio di successo
          $_SESSION["success"] = "Registrazione andata a buon fine. Premere OK per effettuare il login.";
        } else {
          // Errore durante la registrazione
          die("La registrazione non è andata a buon fine");
        }
      }

      // Chiudi la connessione al database
      pg_close($dbconn);
    ?>

    <script>
    <?php
    if (isset($_SESSION["already_reg"])){
      // Mostra un messaggio di errore se l'utente è già registrato
      echo 'Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "' . $_SESSION["already_reg"] . '",
        allowOutsideClick: false
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "../pages/index.php";
        }
      });';
      unset($_SESSION["already_reg"]);
    }
    if(isset($_SESSION["success"])){
      // Mostra un messaggio di successo se la registrazione è avvenuta con successo
      echo 'Swal.fire({
        icon: "success",
        title: "Successo!",
        text: "' . $_SESSION["success"] . '",
        allowOutsideClick: false
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "../pages/index.php";
        }
      });';
      unset($_SESSION["success"]);
    }
    ?>
    </script>
  </body>
</html>
