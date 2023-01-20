<?php
require_once('dbaccess.php'); // verbindung zu db herstellen

if (
    isset($_POST["status"]) || !empty($_POST["status"])
    || isset($_POST["rolle"]) || !empty($_POST["rolle"])
    || isset($_POST["pwd"]) || !empty($_POST["pwd"])
    || isset($_POST["benutzername"]) || !empty($_POST["benutzername"])
) {
    //Um zu checken ob der username schon exisitert
    $db_obj = new mysqli($host, $user, $password, $database);
    $benutzername=$_POST["benutzername"];

    if(isset($_POST["status"]) && !empty($_POST["status"]))
    {
        $sql = "UPDATE user SET rolle=? WHERE benutzername=?";
        $stmt = $db_obj->prepare($sql); // um unerwünschte milisceos code zu verhindern
    
         //"s" stands for string (string datatype is expected) ... i for integer, d for double
        // //followed by the variables which will be bound to the parameters
        $stmt->bind_param("ss", $status, $benutzername);
        $status=$_POST["status"];
        
        
    
        if ($stmt->execute()) {   
            echo "user updated successfully!";
            //trigger forwarding to welcome-page, get-started tutorial,
            //confimation email with username (but without chosen password!), etc.
        } else {
            echo "Error";
            //or specific error-page
        }
    }
    if(isset($_POST["rolle"]) && !empty($_POST["rolle"]))
    {
        $sql2 = "UPDATE user SET rolle=? WHERE benutzername=?";
        $stmt2 = $db_obj->prepare($sql2); // um unerwünschte milisceos code zu verhindern
    
         //"s" stands for string (string datatype is expected) ... i for integer, d for double
        // //followed by the variables which will be bound to the parameters
        $stmt2->bind_param("ss", $rolle, $benutzername);
    
        $rolle=$_POST["rolle"];


    
        if ($stmt2->execute()) {   
            echo "user updated successfully!";
            //trigger forwarding to welcome-page, get-started tutorial,
            //confimation email with username (but without chosen password!), etc.
        } else {
            echo "Error";
            //or specific error-page
        }
    }
    if(isset($_POST["pwd"]) && !empty($_POST["pwd"]))
    {
        $_POST["pwd"] = password_hash($_POST["pwd"], PASSWORD_DEFAULT); //https://www.php.net/manual/de/function.password-hash.php

        $sql3 = "UPDATE user SET pwd=? WHERE benutzername=?";
        $stmt3 = $db_obj->prepare($sql3); // um unerwünschte milisceos code zu verhindern
    
         //"s" stands for string (string datatype is expected) ... i for integer, d for double
        // //followed by the variables which will be bound to the parameters
        $stmt3->bind_param("ss", $pwd, $benutzername);    
        $pwd=$_POST["pwd"];
        
    
        if ($stmt3->execute()) {
   
            echo "user updated successfully!";
            //trigger forwarding to welcome-page, get-started tutorial,
            //confimation email with username (but without chosen password!), etc.
        } else {
            echo "Error";
            //or specific error-page
        }
    }
   
    // $count_row = $result->num_rows; 
    // if ($count_row == 0) { // bei 0 gibts den benutzernamen noch nicht



    //     $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT); //https://www.php.net/manual/de/function.password-hash.php
    //     //to verify the output of password_hash() --> use password_verify //https://www.php.net/manual/de/function.password-verify.php
    //     //--> simple string comparison will not work!
    //     //$_POST["password"] = crypt ($_POST["password"], "xc14"); //https://www.php.net/manual/de/function.crypt.php

    //     //https://www.php.net/manual/de/function.hash.php
    //     //$_POST["password"] = hash('sha256', $_POST["password"]);
    //     //$_POST["password"] = hash('sha512', $_POST["password"]);
    //     //$_POST["password"] = hash('md5', $_POST["password"]); //MD5 is not save anymore!




    //     //https://www.w3schools.com/php/php_mysql_prepared_statements.asp
    //     //https://www.php.net/manual/de/mysqli-stmt.bind-param.php

    //     //question marks (?) are parameters used for later variables bindings. $sql is like a template
    //     $sql = "INSERT INTO user (benutzername, pwd, anrede, vorname, nachname, email, active, rolle) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; // activ ist dann automatisch direk aktiv und user ist gast 

    //     //use prepare function
    //     $stmt = $db_obj->prepare($sql); // um unerwünschte milisceos code zu verhindern

    //     //"s" stands for string (string datatype is expected) ... i for integer, d for double
    //     //followed by the variables which will be bound to the parameters
    //     $stmt->bind_param("ssssssss", $benutzername, $password, $anrede, $vorname, $nachname, $email, $active, $rolle);

    //     $benutzername = $_POST["benutzername"];
    //     $password = $_POST["password"];
    //     $anrede = $_POST["anrede"];
    //     $vorname = $_POST["vorname"];
    //     $nachname = $_POST["nachname"];
    //     $email = $_POST["email"];
    //     $active = 'active';
    //     $rolle = 'guest';

    //     //executes the statement, if successful --> echo
    //     if ($stmt->execute()) {
    //         echo "New user created";
    //         //trigger forwarding to welcome-page, get-started tutorial,
    //         //confimation email with username (but without chosen password!), etc.
    //     } else {
    //         echo "Error";
    //         //or specific error-page
    //     }
    // } else {
    //     echo "Error: Username exisitert bereit!";
    // }
    // //close the statement
    // $stmt->close();
    // //close the connection
    // $db_obj->close();
    header('refresh: 3; url =../../index.php');
}