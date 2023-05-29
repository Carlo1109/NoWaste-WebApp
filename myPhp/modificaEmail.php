<!--
  Questo file php gestisce la richiesta di modifica dell'email all'interno della pagina contenente i dati personali. Interagisce con il database contenente tutti i dati degli utenti.
-->
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
    <script src="../libraries/sweetalert2.all.min.js"></script>
    <title>ModificaEmail</title>
  </head>
  <body>
  <?php
      session_start();
      $pswCurrInserita = $_POST["passwordCurr"];
      $emailNew = $_POST["emailNew"];
      $sessionUser = $_SESSION["username"];
      $sessionPsw = $_SESSION["pswCurr"];
      $dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseUtenti");
      if (!$dbconn) {
        die("Connessione al database fallita");
      }
      if ($pswCurrInserita != $sessionPsw) {
        $_SESSION["modificaERR"] = "La password corrente inserita non è corretta. Aggiornamento dell'email non riuscito. Premere 'OK' per riprovare.";
      }
      else if($emailNew == $sessionUser){
        $_SESSION["modificaWAR"] = "La nuova email è identica alla precedente. Premere 'OK' per riprovare.";
      }
      else {

          $query = "UPDATE utente SET email = '$emailNew' WHERE email = '$sessionUser'";
          $result = pg_query($dbconn, $query);
          if (!$result) {
              die("Errore nella query di modifica");
          }
          $dbconn2 = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseProdotti");
          $query2 = "UPDATE immagini SET email = '$emailNew' WHERE email = '$sessionUser'";
          $result2 = pg_query($dbconn2, $query2);
          if (!$result2) {
              die("Errore nella query di modifica");
          }
          $_SESSION["modificaSUCC"] = "Email aggiornata con successo! Premere 'OK' per effettuare il login con la nuova email.";
      }
    ?>
    <script>
    <?php
    if (isset($_SESSION["modificaERR"])) {
      echo 'Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "' . $_SESSION["modificaERR"] . '",
        allowOutsideClick: false
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "../pages/datiUtente.php";
        }
      });';
      unset($_SESSION["modificaERR"]);
    }
    if (isset($_SESSION["modificaWAR"])) {
      echo 'Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "' . $_SESSION["modificaWAR"] . '",
        allowOutsideClick: false
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "../pages/datiUtente.php";
        }
      });';
      unset($_SESSION["modificaWAR"]);
    }
    if (isset($_SESSION["modificaSUCC"])) {
      echo 'Swal.fire({
        icon: "success",
        title: "Successo!",
        text: "' . $_SESSION["modificaSUCC"] . '",
        allowOutsideClick: false
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "../pages/index.php";
        }
      });';
      unset($_SESSION["modificaSUCC"]);
      session_unset();
      session_destroy();
    }
    ?>
  </script>
  </body>
</html>