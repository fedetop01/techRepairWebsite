<?php
// Connessione al database e altre configurazioni
include("db_connection.php");
  $code = $_REQUEST["code"];
  // Esegui la query per eliminare la riga dal database usando il codice della prenotazione
  $delete_query = "DELETE FROM booking WHERE code = '$code'";
  // Esegui la query e verifica il successo dell'operazione
  $delete_success = pg_query($db,$delete_query);
  // Restituisci una risposta in base all'esito dell'operazione di cancellazione
  if ($delete_success) {
    echo "Booking deleted successfully";
  } else {
    echo "Error deleting booking";
  }
?>
