<?php
    //require_once 'includes/konfiguration.php';
    require_once 'includes/funktionen.inc.php';
    session_start();
    
    
    // Prüfe alle Benutzer, ob einer mit den übergebenen Daten übereinstimmt
    logge_ein($_POST['benutzername'], $_POST['passwort']);
    
    /*
     * Leite zu index.php um. Der Besucher wird entweder das Login-Formular
     * sehen, wenn die Daten falsch waren, oder das Hauptmenu, wenn der Login
     * erfolgreich war. 
     */
    header('Location: index.php');
    
?>