<?php
session_start();

require_once('dbaccess.php'); // verbindung zu db herstellen

if (
    isset($_POST["titel"]) && !empty($_POST["titel"])
    && isset($_POST["inhalt"]) && !empty($_POST["inhalt"])
    && isset($_POST["bild"]) && !empty($_POST["bild"])
 
) {
   

    $db_obj = new mysqli($host, $user, $password, $database);

   



        //question marks (?) are parameters used for later variables bindings. $sql is like a template
    $sql = "INSERT INTO tickets (titel, inhalt, benutzername_ersteller, bearbeitung , bild) VALUES (?, ?, ?, ?, ?)"; 

        //use prepare function
    $stmt = $db_obj->prepare($sql); // um unerwünschte milisceos code zu verhindern

    $stmt->bind_param("sssss", $titel, $inhalt,$benutzername, $bearbeitung ,$bild);
    $titel = $_POST["titel"];
    $inhalt = $_POST["inhalt"];
    $benutzername=$_SESSION['user']; //um ticket mit eingeloggten user zu verknüpfen
    $bearbeitung="offen";
    $bild = $_POST["bild"];
    
        //executes the statement, if successful --> echo
    if ($stmt->execute()) {
            echo "New ticket created";
            //trigger forwarding to welcome-page, get-started tutorial,
            //confimation email with username (but without chosen password!), etc.
    } else {
            echo "Error";
            //or specific error-page
            }
    
    //close the statement
    $stmt->close();
    //close the connection
    $db_obj->close();
    header('refresh: 3; url =../../kontakt.php');
}
