<!--
  Questo file php gestisce la richiesta di logout da parte dell'utente.
-->
<?php
session_start();
if (isset($_SESSION["logged_in"])) {
  session_unset();
  session_destroy();
}
header("Location: ../pages/index.php");
exit();
?>
