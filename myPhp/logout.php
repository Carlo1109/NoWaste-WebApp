<?php
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../pages/index.php"); // reindirizza l'utente alla pagina home
  exit;
?>
