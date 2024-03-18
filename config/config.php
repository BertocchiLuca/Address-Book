<?php

/**
 * Avvio della sessione
 */

session_start();
setcookie(session_name(), session_id(), strtotime("1 day"), '/', 'localhost', TRUE, TRUE);

ini_set('display_errors', 1);

/**
 * Connessioni al database
 */


/**
 * Import di file contenenti Classi PHP
 */

