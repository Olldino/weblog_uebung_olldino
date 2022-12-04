<?php
require_once 'includes/konfiguration.php';
require_once 'includes/funktionen.inc.php';
$eintraege= hole_eintraege();

$neuauflage= array();

foreach ($eintraege as $e) {
   
    if(!($e['autor']==$_GET['autor'] &&$e['erstellt_am']==$_GET['t'])){
         
        $neuauflage[]=  array(
            'titel'       => $e['titel'],
            'erstellt_am' => $e['erstellt_am'],
            'autor'       => $e['autor'],
            'inhalt'      => $e['inhalt']
        );
        
     
    }

}
$neuauflage = loesche_eintraege();
file_put_contents(PFAD_EINTRAEGE, serialize($neuauflage));
header("Location:index.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
    <title>Weblog - Eintrag Löschen</title>
</head>

<body>
    
    <div id="gesamt">
    
        <div id="kopf">
            <h1>Mein Weblog</h1>
        </div>
        
        <div id="inhalt">
            
            <h3>Folgender Eintrag wurde gelöscht:</h3>
			<div class="zitat">
            	<h1><?php echo htmlspecialchars($eintrag['titel']); ?></h1>
                <p>
                    <?php echo nl2br(htmlspecialchars($eintrag['inhalt'])); ?>
                </p>
                <p>
	                <a href="index.php" class="backlink">Zurück zur Hauptseite</a>
	            </p>
			</div>
        </div>
        
        <div id="menu">
            <?php require 'includes/hauptmenu.php'; ?>
        </div>
        
        <div id="fuss">
            Das ist das Ende
        </div>
            
    </div>

</body>

</html>

