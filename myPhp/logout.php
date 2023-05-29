<!--
  Questo file php gestisce la richiesta di logout da parte dell'utente.
-->
<?php
session_start();

// Controlla se l'utente è già loggato
if (isset($_SESSION["logged_in"])) {
  // Se l'utente è loggato, esegue il logout
  session_unset(); // Cancella tutte le variabili di sessione
  session_destroy(); // Distrugge la sessione attiva
}

// Reindirizza alla pagina di login dopo il logout
header("Location: ../pages/index.php");
exit();
?>
