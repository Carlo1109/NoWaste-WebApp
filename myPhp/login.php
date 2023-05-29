<!--
  Questo file php gestisce la richiesta di login da parte dell'utente, interagendo con il database contentene tutte le informazioni degli utenti.
-->
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
    <script src="../libraries/sweetalert2.all.min.js"></script>
    <title>Login</title>
  </head>
  <body>
    <?php
      // Inizio del blocco di codice PHP per verificare l'utente nel database
      session_start();
      $email = $_POST["username"];

      // Connessione al database
      $dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseUtenti");

      // Query per selezionare l'utente dal database
      $query = "SELECT * FROM utente WHERE email=$1";
      $result = pg_query_params($dbconn, $query, array($email));

      if ($line = pg_fetch_array($result)) {
        // L'utente è presente nel database, verificare la password
        $pswd = $_POST["psw"];
        $query2 = "SELECT * FROM utente WHERE email=$1 AND pswd=$2";
        $result = pg_query_params($dbconn, $query2, array($email, $pswd));

        if ($line = pg_fetch_array($result)) {
          // L'utente ha inserito la password corretta, procedi con il login

          // Ottieni il nome dell'associazione dell'utente
          $query3 = "SELECT nomeass FROM utente WHERE email='" . $email . "'";
          $result = pg_query($query3);
          $line = pg_fetch_assoc($result);

          if ($line["nomeass"] == null) {
            // L'utente non è associato a un'associazione
            $_SESSION["assBoolean"] = false;
          } else {
            // L'utente è associato a un'associazione
            $_SESSION["assBoolean"] = true;
          }

          // Imposta le variabili di sessione per il login
          $_SESSION["logged_in"] = true;
          $_SESSION["username"] = $_POST["username"];
          $_SESSION["pswCurr"] = $_POST["psw"];

          // Reindirizza alla pagina principale dopo il login
          header("Location: ../pages/index.php?login=success");
          exit();
        } else {
          // La password inserita non è corretta
          $_SESSION["login_error_psw"] = "La password inserita non è corretta, clicca OK per ritornare alla home e riprovare.";
        }
      } else {
        // L'utente non è registrato nel database
        $_SESSION["login_error_unreg"] = "L'utente non è registrato. Vuoi registrarti o riprovare il login?";
      }
    ?>
    <script>
    //gestione degli errori con sweetalert
    <?php
    if (isset($_SESSION["login_error_psw"])){
      echo 'Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "' . $_SESSION["login_error_psw"] . '",
        allowOutsideClick: false
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "../pages/index.php";
        }
      });';
      unset($_SESSION["login_error_psw"]);
    }
    if (isset($_SESSION["login_error_unreg"])) {
      echo 'Swal.fire({
        title: "Oops...",
        text: "'.$_SESSION["login_error_unreg"].'",
        icon: "error",
        showDenyButton: true,
        confirmButtonText: "Sign in",
        denyButtonText: "Ritenta Login",
        allowOutsideClick: false,
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "../pages/sigin.php";
        } else if (result.isDenied) {
          window.location.href = "../pages/index.php";
        }
      })';
      unset($_SESSION["login_error_unreg"]);
    }
    ?>
  </script>
  </body>
</html>