<?php
session_start();
$nome = $_POST['nome'];
$scad = $_POST['scadenza'];
$dbconn = pg_connect("host=localhost user=postgres password=ltwsql port=5432 dbname=DatabaseProdotti");

if (!$dbconn) {
  die("Connessione al database fallita");
}

// Elimina il prodotto dal database
$query = "DELETE FROM immagini WHERE titolo ='$nome' AND scad = '$scad'";
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