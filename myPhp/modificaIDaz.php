<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
    <script src="../libraries/sweetalert2.all.min.js"></script>
    <title>ModificaIDAzienda</title>
  </head>
  <body>
  <?php
      session_start();
      $pswCurrInserita = $_POST["passwordCurr"];
      $idazNew = $_POST["idazNew"];
      $sessionUser = $_SESSION["username"];
      $sessionPsw = $_SESSION["pswCurr"];
      $dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseUtenti");
      if (!$dbconn) {
        die("Connessione al database fallita");
      }
      if ($pswCurrInserita != $sessionPsw) {
        $_SESSION["modificaERR"] = "La password corrente inserita non è corretta. Aggiornamento dell'ID Azienda non riuscito. Premere 'OK' per tornare alla home.";
      }
      else {
          $query = "UPDATE utente SET idaz = '$idazNew' WHERE email = '$sessionUser'";
          $result = pg_query($dbconn, $query);
          if (!$result) {
              die("Errore nella query di modifica");
          }
          $_SESSION["modificaSUCC"] = "ID Azienda aggiornato con successo! Premere 'OK' per tornare alla home.";
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
          window.location.href = "../pages/index.php";
        }
      });';
      unset($_SESSION["modificaERR"]);
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
    }
    ?>
  </script>
  </body>
</html>