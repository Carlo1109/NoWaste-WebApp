<!--
  Questo file php gestisce la richiesta di entrare a far parte del database ISCRITTI NEWSLETTER. Viene verificata la presenza dell'email nel database e se il check è negativo, l'email viene iscritta correttamente alla newsletter.
-->
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweetalert2.min.css">
    <script src="../libraries/sweetalert2.all.min.js"></script>
    <title>Newsletter</title>
  </head>
  <body>
    <?php
      $dbcon = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseNewsletter");

      $iscritto = pg_escape_string($_POST["emailIscritto"]);

      // Verifico se l'email è già presente nella tabella
      $query = "SELECT COUNT(*) as count FROM iscrittinewsletter WHERE iscritto = '$iscritto'";
      $result = pg_query($dbcon, $query);


      $count = pg_fetch_assoc($result)['count'];
      if ($count > 0) {
          //L'email esiste già nella tabella
          $_SESSION["alreadyPres"] = "Questa email è già presente nel database.";
      } else {
          // Inserisci i dati nella tabella richieste Postgres
          $dataiscrizione = date('d-m-Y');
          $query = "INSERT INTO iscrittinewsletter (iscritto, dataiscrizione) VALUES ('$iscritto', '$dataiscrizione')";
          $result = pg_query($dbcon, $query);
          if($result)
            $_SESSION["newsCorr"] = "Iscritto correttamente alla newsletter NoWaste.";

          // Chiudi la connessione al database
          pg_close($dbcon);
      }
      ?>
      <script>
        <?php
          if (isset($_SESSION["alreadyPres"])){
            echo 'Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "' . $_SESSION["alreadyPres"] . '",
              allowOutsideClick: false
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "../pages/index.php";
              }
            });';
            unset($_SESSION["alreadyPres"]);
          }
          if(isset($_SESSION["newsCorr"])){
            echo 'Swal.fire({
              icon: "success",
              title: "Successo!",
              text: "' . $_SESSION["newsCorr"] . '",
              allowOutsideClick: false
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "../pages/index.php";
              }
            });';
            unset($_SESSION["newsCorr"]);
          }
        ?>
      </script>
  </body>
</html>