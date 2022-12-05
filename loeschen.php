<?php
require_once 'includes/konfiguration.php';
require_once 'includes/funktionen.inc.php';
session_start();

if(ist_eingeloggt()){
    loesche_eintraege($_GET['index']);
}

header("Location:index.php");
?>