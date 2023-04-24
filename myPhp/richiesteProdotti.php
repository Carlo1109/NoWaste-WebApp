<?php
session_start();
$dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseRichieste");

if (!$dbconn) {
  die("Connessione al database fallita");
}

$prodotto = $_POST["prodotto"];
$quantita = $_POST["quantita"];
$caricatoda = $_POST["caricatoda"];
$richiestoda = $_POST["richiestoda"];

$query = "INSERT INTO richieste (prodotto, quantita, caricatoda, richiestoda) VALUES ($prodotto, $quantita, $caricatoda, $richiestoda)";
$result = pg_query($dbconn, $query);
if (!$result) {
  http_response_code(500);
  die("Errore nella query di eliminazione");
}

// Invia una risposta di successo al client
http_response_code(200);

// Chiudi la connessione al database
pg_close($dbconn);
?>