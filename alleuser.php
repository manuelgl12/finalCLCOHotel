<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,300;0,400;0,200;1,100&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
    <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/style.css">
  
  <!--ICONS-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!---icon-->
  
    <title>User (Admin) </title>
</head>


<body class="ticketbody">
 <?php 
    include 'nav.php';
 ?>


<?php
require_once('DB/files/dbaccess.php');

$db_obj = new mysqli($host, $user, $password, $database);

$sql = "SELECT * from user;";
$stmt = $db_obj->prepare($sql);
        

$stmt->execute(); //sql objekt das aus der datenbank zurückkommt
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table>
    <tr>
        <th>BENUTZERNAME</th>
        <th>ANREDE</th>
        <th>VORNAME</th>
        <th>NACHNAME</th>
        <th>EMAIL</th>
        <th>STATUS</th>
        <th>ROLLE</th>
        <th>STATUS ÄNDERN</th>
        <th>ROLLE ÄNDERN</th>
        <th>PW ÄNDERN</th>
        <th></th>
        <th></th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      
        echo "<tr>
        <td>".$row['benutzername']."</td>
        <td>".$row['anrede']."</td>
        <td>".$row['vorname']."</td>
        <td>".$row['nachname']."</td>
        <td>".$row['email']."</td>
        <td>".$row['active']."</td>      
        <td>".$row['rolle']."</td>



        <form action='DB/files/update_user.php' method='POST'>
    
        <td>    
             <select name='status' >
                         <option disabled selected value>select an option</option>
                         <option value='active' name='active' id='active' >aktiv</option>
                         <option value='inaktiv' name='inaktiv' id='inaktiv' >inaktiv</option>
        </td>
        
        <td>
                <select name='rolle' >
                    <option disabled selected value>select an option</option>
                    <option value='guest' name='guest' id='guest' >gast</option>
                    <option value='techniker' name='techniker' id='techniker'>techniker</option>
        </td>       
        <td>
        <input type='text' name='pwd' type='hidden'  maxlength='100'></text> 
        </td>
        <td><input type='submit'></input></td>
        <td><input name='benutzername' value='".$row['benutzername']."' type='hidden'></td>
       </form>
    </tr>";
      }
      
  } else {
    echo "0 results";
  }
  echo "</table>";

   //close the statement
   $stmt->close();
   //close the connection
   $db_obj->close();
?>
</body>