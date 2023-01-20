<?php
require_once('dbaccess.php'); // verbindung zu db herstellen

if (
    isset($_POST["anrede"]) && !empty($_POST["anrede"])
    && isset($_POST["vorname"]) && !empty($_POST["vorname"])
    && isset($_POST["nachname"]) && !empty($_POST["nachname"])
    && isset($_POST["benutzername"]) && !empty($_POST["benutzername"])
    && isset($_POST["password"]) && !empty($_POST["password"])
    && isset($_POST["email"]) && !empty($_POST["email"])
) {
    //Um zu checken ob der benutzername schon exisitert, erstellen wir eine variable mit username
    $username = $_POST["benutzername"];

    $db_obj = new mysqli($host, $user, $password, $database); //datenabfrage

    $sql = "SELECT * from user WHERE benutzername=?"; //select von der db wo benutzername gesucht wird um zu checken obs ihn schon gibt
    $stmt = $db_obj->prepare($sql); // um unerwünschte milisceos code zu verhindern

    //"s" stands for string (string datatype is expected) ... i for integer, d for double
    //followed by the variables which will be bound to the parameters
    $stmt->bind_param("s", $username); //wir binden ihn 

    $stmt->execute(); //sql objekt das aus der datenbank zurückkommt ausgeführt
    $result = $stmt->get_result(); //hier die resulatet

    $count_row = $result->num_rows; 
    if ($count_row == 0) { // bei 0 gibts den benutzernamen noch nicht



        $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT); //https://www.php.net/manual/de/function.password-hash.php
        //to verify the output of password_hash() --> use password_verify //https://www.php.net/manual/de/function.password-verify.php
        //--> simple string comparison will not work!
        //$_POST["password"] = crypt ($_POST["password"], "xc14"); //https://www.php.net/manual/de/function.crypt.php

        //https://www.php.net/manual/de/function.hash.php
        //$_POST["password"] = hash('sha256', $_POST["password"]);
        //$_POST["password"] = hash('sha512', $_POST["password"]);
        //$_POST["password"] = hash('md5', $_POST["password"]); //MD5 is not save anymore!




        //https://www.w3schools.com/php/php_mysql_prepared_statements.asp
        //https://www.php.net/manual/de/mysqli-stmt.bind-param.php

        //question marks (?) are parameters used for later variables bindings. $sql is like a template
        $sql = "INSERT INTO user (benutzername, pwd, anrede, vorname, nachname, email, active, rolle) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; // activ ist dann automatisch direk aktiv und user ist gast 

        //use prepare function
        $stmt = $db_obj->prepare($sql); // um unerwünschte milisceos code zu verhindern

        //"s" stands for string (string datatype is expected) ... i for integer, d for double
        //followed by the variables which will be bound to the parameters
        $stmt->bind_param("ssssssss", $benutzername, $password, $anrede, $vorname, $nachname, $email, $active, $rolle);

        $benutzername = $_POST["benutzername"];
        $password = $_POST["password"];
        $anrede = $_POST["anrede"];
        $vorname = $_POST["vorname"];
        $nachname = $_POST["nachname"];
        $email = $_POST["email"];
        $active = 'active';
        $rolle = 'guest';

        //executes the statement, if successful --> echo
        if ($stmt->execute()) {
            echo "New user created";
            //trigger forwarding to welcome-page, get-started tutorial,
            //confimation email with username (but without chosen password!), etc.
        } else {
            echo "Error";
            //or specific error-page
        }
    } else {
        echo "Error: Username exisitert bereits!";
    }
    //close the statement
    $stmt->close();
    //close the connection
    $db_obj->close();
    header('refresh: 3; url =../../login.php');
}
