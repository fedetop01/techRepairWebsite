<?php
include('db_connection.php');

  $today = date('l, F j, Y');

  $timestamp = date('g:i A');


if (isset($_COOKIE['cookie_accepted']) && isset($_SESSION['authorized'])) {
  $cookieAccepted = $_COOKIE['cookie_accepted'];

  if ($cookieAccepted === "1") {

    if (!isset($_COOKIE['LAST_VISIT'])) {
         $lasttime = "";
    } else {
         $lasttime = $_COOKIE['LAST_VISIT'];
    }
    $visita_attuale = $today . " alle " . $timestamp;

    setcookie ("LAST_VISIT", $visita_attuale, time() + 3600*24*10);
  }

   elseif ($cookieAccepted === "0" && isset($_SESSION['authorized'])) {
    // Rifiutato, gestisci i cookie come desiderato o elimina quelli impostati in precedenza
    // Disconnetti l'utente
        session_unset(); // Rimuovi tutte le variabili di sessione
        session_destroy(); // Distruggi la sessione corrente
      }

  }

?>
