<?php 

// Qui definiamo i parametri che servono per la connessione al database
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'db-university');
define('DB_PORT', 8889);


// Effettuiamo la connessione al database
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);


// Adesso controlliamo se la connessione è andata a buon fine o no
if($conn && $conn->connect_error) {
    // Messaggio che comunico se la connessione non va a buon fine
    echo 'Connessione fallita' .  $conn->connect_error;
    // Termino il programma
    die();
}

?>