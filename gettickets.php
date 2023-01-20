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
  
    <title>Tickets (Techniker) </title>
</head>


<body class="ticketbody">
 <?php 
    include 'nav.php';
 ?>


<?php
require_once('DB/files/dbaccess.php');

$db_obj = new mysqli($host, $user, $password, $database);

$sql = "SELECT * from tickets;";
$stmt = $db_obj->prepare($sql);

    
    
    
$stmt->execute(); //sql objekt das aus der datenbank zurückkommt
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  
    // output data of each row
    echo "<table>
    <tr>
        <th>ID</th>
        <th>TITEL</th>
        <th>DATUM</th>
        <th>INHALT</th>
        <th>USER</th>
        <th>BILD</th>
        <th>STATUS</th>
        <th>ANTWORT</th>
        <th>STATUS AENDERN</th>
        <th></th>
        <th></th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
      if($row['bearbeitung'] == 'offen')
      {
        echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row['titel']."</td>
        <td>".$row['datum']."</td>
        <td>".$row['inhalt']."</td>
        <td>".$row['benutzername_ersteller']."</td>
        <td>".$row['bild']."</td>
        <td>".$row['bearbeitung']."</td>        
        <form action='DB/files/update_ticket_db.php' method='POST'>
        <td>
        <textarea name='inhalt' type='hidden' rows='5' cols='30' maxlength='200' required></textarea>
        </td>
        <td>    
             <select name='status' required>
                         <option value='offen' name='offen' id='offen'>offen</option>
                         <option value='erfolglos geschlossen' name='erfolglos' id='erfolglos'>erfolglos geschlossen</option>
                         <option value='erfolgreich geschlossen' name='erfolgreich' id='erfolgreich'>erfolgreich geschlossen</option>
        </td>
        <td><input type='submit'></input></td>
        <td><input name='id' value='".$row['id']."' type='hidden'></td> 
      
       </form>
    </tr>";
      }
      else{
        echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row['titel']."</td>
        <td>".$row['datum']."</td>
        <td>".$row['inhalt']."</td>
        <td>".$row['benutzername_ersteller']."</td>
        <td>".$row['bild']."</td>
        <td>".$row['bearbeitung']."</td>        
        <form action='DB/files/update_ticket_db.php' method='POST'>
        <td>
        <text>".$row['antwort']."</text>
        </td>
        <td>    
        <text>geschlossen!</text>
        </td>
        <td><text>geschlossen!</text></td>
        <td><input name='id' value='".$row['id']."' type='hidden'></td>
       </form>
    </tr>";
      }
       
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