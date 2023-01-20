<?php
session_start();
require_once('dbaccess.php'); // verbindung zu db herstellen

if (
    isset($_POST["vorname"]) && !empty($_POST["vorname"])
    && isset($_POST["nachname"]) && !empty($_POST["nachname"])
    && isset($_POST["email"]) && !empty($_POST["email"])
    && isset($_POST["oldpassword"]) && !empty($_POST["oldpassword"])
    && isset($_POST["newpassword"]) && !empty($_POST["newpassword"])
    && isset($_POST["newpassword2"]) && !empty($_POST["newpassword2"])

) {
    $db_obj = new mysqli($host, $user, $password, $database);
   
    $sql = "SELECT * from user WHERE benutzername=?"; 
		 $stmt = $db_obj->prepare($sql); // um unerwünschte milisceos code zu verhindern

		 //"s" stands for string (string datatype is expected) ... i for integer, d for double
		 //followed by the variables which will be bound to the parameters
		 $stmt-> bind_param("s", $benutzername);

		 $benutzername = $_SESSION['user'];

		$stmt->execute(); //sql objekt das aus der datenbank zurückkommt
		$result= $stmt->get_result();
			
			$count_row = $result->num_rows;
			if($count_row ==0) //0 da benutzername nicht vorhande
			{
				echo "Username doesn't exist!";
			}

			if($count_row == 1) //1 heisst benutzername ist vorhanden 
			{
				$user_data = $result->fetch_assoc(); //returned die daten der reihe die aus dem sql statment kommt, zurück als array
				$oldpassword = $_POST["oldpassword"]; //altes pw wird in variable oldpassword gespeichert

				if(password_verify($oldpassword,$user_data['pwd'])) //passwörter werden verglichen
				{
					
                    if($_POST['newpassword'] == $_POST['newpassword2']) //neue pw müssen übereinstimmen
                    {
                        $_POST["newpassword"] = password_hash($_POST["newpassword"], PASSWORD_DEFAULT); //https://www.php.net/manual/de/function.password-hash.php

                        $sql = "UPDATE user SET vorname = ?, nachname=?, email=?,pwd=? WHERE benutzername=?"; //mit update kann man daten überschreiben
                  $stmt = $db_obj->prepare($sql); // um unerwünschte milisceos code zu verhindern
              
                   //"s" stands for string (string datatype is expected) ... i for integer, d for double
                  // //followed by the variables which will be bound to the parameters
                  $stmt->bind_param("sssss", $vorname, $nachname, $email, $pwd,$benutzername);
              
                  $vorname=$_POST["vorname"];
                  $nachname=$_POST["nachname"];
                  $email=$_POST["email"];
                  $pwd=$_POST["newpassword"];
                  $benutzername=$_SESSION["user"];

              
                  if ($stmt->execute()) {
                      echo "user updated successfully!";
                      //trigger forwarding to welcome-page, get-started tutorial,
                      //confimation email with username (but without chosen password!), etc.
                  } else {
                      echo "Error";
                      //or specific error-page
                  }
                    }
                    else
                    {
                        echo "Error: The new passwords you enter are not the same!";
                    }
				  
					
				}
				else{
					echo "Wrong Password!";
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
else
{
    echo "Error";
}