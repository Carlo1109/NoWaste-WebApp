<?php
session_start();
if (isset($_SESSION["logged_in"])) {
  $dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseUtenti");
  $dbconn2 = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseProdotti");
  if (!$dbconn) {
    die("Connessione al database fallita");
  }
  if (!$dbconn2) {
    die("Connessione al database fallita");
  }
  $sessionUser = $_SESSION["username"];
  $query = "DELETE FROM utente WHERE email='$sessionUser'";
  $query2 ="SELECT * FROM immagini WHERE email='$sessionUser'";
  $result = pg_query($dbconn, $query);
  $result2 = pg_query($dbconn2, $query2);
  if (pg_num_rows($result2) != 0) {
    $query3 ="DELETE FROM immagini WHERE email='$sessionUser'";
    $result3 = pg_query($dbconn2, $query3);
    if(!$result3){
      die("Errore nella query di eliminazione");
    }
  }
  if (!$result || !$result2) {
  die("Errore nella query di eliminazione");
  }
  $_SESSION["eliminazioneSuccess"] = "Profilo eliminato correttamente";
}
?>
<script>
  <?php
  if (isset($_SESSION["eliminazioneSuccess"])) {
    echo 'alert("' . $_SESSION["eliminazioneSuccess"] . '");';
    unset($_SESSION["eliminazioneSuccess"]);
    session_unset();
    session_destroy();
    echo 'window.location.href = "../pages/index.php";';
  }
  ?>
</script>