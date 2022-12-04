<?php
    require_once 'includes/konfiguration.php';
    require_once 'includes/funktionen.inc.php';
    session_start();
    
    
    
    $eintraege = hole_eintraege(true);
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
    <title>Weblog - Einträge</title>
</head>

<body>

    <div id="gesamt">
        
        <div id="kopf">
            <h1>Mein Weblog</h1>
        </div>
        
        <div id="inhalt">
            
            <?php foreach ($eintraege as $e): 
                
                ?>
              
                
                <h1><?php echo htmlspecialchars($e['title']); ?></h1>
	            <?php echo nl2br(htmlspecialchars($e['text'])); ?>
	            
	            <p class="eintrag_unten">
	                <span>
                        geschrieben von
	                    <?php echo $e['name']; ?>
	                    <?php echo $e['surname']; ?>
	                    <?php echo $e['nickname']; ?>
	                    am <?php echo  date('d.m.Y',strtotime($e['timestamp'])); ?>
	                    um <?php echo date('G:i', strtotime($e['timestamp'])); ?>
                        <?php 
                        
                        
                        if(ist_loeschberechtigt($e['nickname'])){ ?>
                             <a href="loeschen.php?index=<?=$e['id']?>">Löschen</a>
                        <?php } ?>
                        
	                </span>
	            </p>
            <?php endforeach; ?>
            
        </div>
        
        <div id="menu">
            <?php
                
                if (ist_eingeloggt()) {
				    require 'includes/hauptmenu.php';
                } else {
                	require 'includes/loginformular.php';
                } 
            ?>
        </div>
        
        <div id="fuss">
            Das ist das Ende
        </div>
            
    </div>

</body>

</html>