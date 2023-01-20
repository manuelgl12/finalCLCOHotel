<?php
    require_once ('dbaccess.php'); //to retrieve connection details

    $db_obj = new mysqli($host, $user, $password, $database);
    if ($db_obj->connect_error) {
        echo "Connection Error: " . $db_obj->connect_error;
        exit();
    }
    /*...*/
    $sql = "SELECT * FROM users";
    $result = $db_obj->query($sql);

    echo "<pre>" . print_r($result->fetch_array(), true) . "</pre>";
    // echo "<pre>" . print_r($result->fetch_row(), true) . "</pre>";
    // echo "<pre>" . print_r($result->fetch_assoc(), true) . "</pre>";
    // echo "<pre>" . print_r($result->fetch_object(), true) . "</pre>";


    // while ($row = $result->fetch_array()) { //assoc works, object can not be used as array to iterate over it

    //     echo "id: " . $row['id'] . "<br>";
    //     echo "username: " . $row['username'] . "<br>";
    //     echo "password: " . $row['password'] . "<br>";
    //     echo "email: " . $row['email'] . "<br>";
    //     echo "<br>";
    // }


    // $data = array();

    // while ($row = $result->fetch_object()) {
    //     array_push($data, $row);
    // }
    // echo "<pre>" . print_r($data, true) . "</pre>";

?>