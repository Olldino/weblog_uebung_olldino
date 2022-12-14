<?php



use LDAP\Result;

function hole_eintraege($umgedreht = false){
    $order = "";
    if($umgedreht){$order = "ORDER BY timestamp DESC";}
    $db = getDBconnection();
    $query = 'SELECT entry.id, title, text, timestamp, nickname, name, surname 
            FROM entry
            JOIN user ON user.id = entry.user_id ' .$order;
    $result = $db->query($query);
    return $result->fetchAll();
}

function loesche_eintraege($id){
    $db = getDBconnection();
    $query_loeschen = "DELETE
                    FROM entry
                    WHERE id = $id";
    $db->query($query_loeschen);
    
}

function erstelle_eintraege($title, $text){
    $db = getDBconnection();
    
    $nickname = $_SESSION["eingeloggt"];
    $uid=1;
    //$uid = $db->query("SELECT ID FROM user WHERE nickname = $nickname");
    $query_erstellen = "INSERT INTO entry (title, text, user_id) VALUES ('$title','$text',$uid)";
    $result = $db->query($query_erstellen);
    
}

function logge_ein($n, $p){
    $db = getDBconnection();
    $query = "SELECT id, name FROM user 
    where nickname = '$n' AND
    password = '$p'";
    $result = $db->query($query);
    $result = $result->fetch();
    if($result) $_SESSION['eingeloggt'] = $n;
}

function ist_eingeloggt() {
    $erg = false;
    if (isset($_SESSION['eingeloggt'])) {
        if (!empty($_SESSION['eingeloggt']))
            $erg = true;
    }
    return $erg;
}



function logge_aus() {
    unset($_SESSION['eingeloggt']);
}

function ist_loeschberechtigt($nickname){
    if(ist_eingeloggt()){
        if($nickname == $_SESSION['eingeloggt']){
            return true;
        }
    }
    return false;
}


function getDBconnection(){
    $db = new PDO('mysql:host=localhost;dbname=webblog','root');
    return $db;
}

?>